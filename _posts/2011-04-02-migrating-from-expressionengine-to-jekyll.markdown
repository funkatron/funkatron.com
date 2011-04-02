---
layout: post
title: "Migrating from ExpressionEngine to Jekyll"
author: funkatron
published: false
categories:
- ExpressionEngine
- Jekyll
- PHP
- Ruby
date: 2011-04-02

---


I've run Funkatron.com on [ExpressionEngine](http://expressionengine.com) for a long time. It's a strong, flexible, powerful CMS that I recommend to many folks who need to build content-driven sites, especially those where the site will be administered by non-programmers. It's a very solid choice for consultants and freelancers, who can build the relatively small license cost into their fees -- and probably save the client in the long run.

However, over the years, I've found it to be overkill for a blog site. If you're only maintaining one or two types of content (like blog posts and links), the overhead involved in maintaining the system becomes unweildly. I've long put off upgrading to EE2 because I dreaded having to convert my templates, find replacements for incompatible addons, and finding all the little bugs that seem to pop up in a major version upgrade.

[Jekyll](http://jekyllrb.com/) is quite the opposite of a system like ExpressionEngine. It's entirely command-line driven, so you *have* to be comfortable with the shell and some scripting. It's really aimed at web programmers who want a simple tool to publish a blog, without worrying about all the overhead of databases, web-based adminstration, and a monster code base. You have very fine-grained control over how everything works.

The simplicity of Jekyll has been appealing to me since I encountered it when messing around with the [GitHub Pages](http://pages.github.com/) feature. I never ended up doing a lot with GitHub Pages, but the idea of a simple, script-driven blog generator has continued to be very appealing to me.

A few weeks ago, I decided I either needed to bite the bullet and either upgrade to EE2, or switch to another system.  I decided to do the latter, and give Jekyll a shot.

This post won't go into every detail about running a Jekyll site. You should definitely read the docs and get familiar with how it works. I'll just be covering issues of note particular to my move from EE to Jekyll. I also encourage you to check out [my GitHub repo for funkatron.com](https://github.com/funkatron/funkatron.com), which contains *almost* everything I use for my Jekyll site.

### Exporting posts ###

The biggest challenge was sorting out how to get the data out of ExpressionEngine. Each entry in my blog "weblog" (an EE term for a collection of a content type) consisted of these fields:

  - title
  - date
  - author
  - categories
  - slug
  - summary - *rarely used*
  - post body
  - post body format - *a formatter that is applied on output, so you can write posts in textile of markdown and they come out as HTML*
  - extended text - *rarely used*
  - keywords/tags - *comma-separated*

From that, I needed to get my posts into flat files, consisting of [some Yaml at the top](https://github.com/mojombo/jekyll/wiki/yaml-front-matter), and the post content underneath.

The typical approach for exporting data from an existing system is to directly query the DB, but this is a bit more complex with EE. EE has a very, very complex schema that's basically a case study in why RDBMSes are not suitable for flexible content storage. So yeah, I could dive into that monster, but I was not excited about doing it.

Thankfully, a little Googlin' turned up a much more sensible solution: Just use EE itself to generate a dump file. Because you can generate just about any kind of content format with EE's templates, you can let the CMS itself do the dirty work of pulling the post content together, and format it as needed.

I basically followed the approach [Robin Fay suggests in her blog](http://contentdivergent.blogspot.com/2008/01/exporting-from-expression-engine.html). She's dumping data out to import into Movable Type, though, so I had to do things a little differently.

1. I made a template group in ExpressionEngine called `exp`
2. I created a template in the `exp` group called `comments`.
  <script src="https://gist.github.com/874509.js?file=comments.html"></script>
  Yes, this will output the comments as HTML. More on that later.
  
3. I created a template in the `exp` group called `posts_jekyll`.
  <script src="https://gist.github.com/874507.js?file=export_jekyll.html"></script>
  Here I am generating the Yaml "front matter" to include some required stuff (like `layout` and `title`) and also include some custom properties, like `author` and `old_entry_id`. I'm also spitting out `category` in the Yaml-prescribed way to do an array of items. Some of these custom properties I didn't end up needing, but I think it's much better to have more data than less, especially when I wasn't 100% sure of what I'd need.    
  
  I'm also generating `body` and `extended` after the Yaml, without any wrapping HTML – these properties will be output post-formatting filters, so they'll already be HTML. Finally, if the post has comments, I embed that `comments` template we created to spit them out as HTML.
4. Finally, I pulled the data down with curl and into a local file    

    <pre><code>curl http://funkatron.com/exp/posts_jekyll > ee_posts.txt</code></pre>

I had to iterate and refactor this export dump a lot, because I had to make very sure I had all the data I needed, and I had a lot of posts: nearly 1000. Depening on your own ExpressionEngine setup, you may have more or less to worry about. Be prepared to experiment.

### How to handle comments ###

Note that in my dump, I just have the comments embedded at the end of the posts as HTML. I did this because:

1. I didn't want to lose the comments
2. I didn't want to allow commenting anymore

So basically, I wanted to keep what was there for posterity, but I wasn't going to include commenting ability in the new setup. That made things easier for me. If you want to keep comments, you might look into [dumping your comment data into Disqus](https://gist.github.com/202802).

Looking back, I probably could have delineated the comments section better. I'm not sure I'm 100% happy with how I did it, but it's acceptable.

### Splitting up the dump file ###

So I've generated one big text file with all my post data. Jekyll wants each post in its own file, so I needed to sort out how to split the dump file. Anticipating this, I included a bit of HTML at the end of each post to mark the end:

    `<!-- end of post -->`

Jekyll is also rather picky about how the files are names, so I needed to parse the Yaml to generate the filename.

I looked into several bash scripting approaches, but I had trouble adapting them to what I needed. In the end I went with what I know, and wrote a small1 PHP shell script to split the files as I needed:

<script src="https://gist.github.com/874502.js?file=split_ee_jekyll_output.php"></script>

This script pulls in the contents of the file, splits it based on my post delimiter, and then iterates over each post in the `$split` array, pulling out the Yaml data and using `preg_match()` to grab the `date` and `url_title` properties to build the filename. It then writes out the post file with that filename.

Now I had a bunch of jekyll-format post files. I put these in the `_posts` directory.

### Site layouts ###

Probably the hardest bit of this process was figuring out the templating system. There aren't any examples or best practices described in the Jekyll docs, so I ended up futzing around a lot. What helped the most was finding a couple folks who put [their entire blog up on GitHub](https://github.com/al3x/al3x.github.com/), so I could see exactly how they did it and <strike>rip them off</strike> borrow their approaches.

Things made a lot more sense when I realized that the templates themselves can have Yaml at the top, and they can use other templates as a "parent." So in my setup, I have a base layout called [`default.html`](https://github.com/funkatron/funkatron.com/blob/master/_layouts/default.html), and a [`post.html`](https://github.com/funkatron/funkatron.com/blob/master/_layouts/post.html) which uses `default.html` as its parent. When `post.html` is parsed, its content is injected into the `default.html` template in the [`{{content}}` placeholder](https://github.com/funkatron/funkatron.com/blob/master/_layouts/default.html#L61). I also have a `page.html` layout template for non-post, informational pages (like "About"). So in my `_posts` files, I put `layout: post` in the Yaml, and it will use the `post.html` layout. In my other pages, I use `layout: page`.

Getting my site looking the way I wanted was a bit of a challenge, because Jekyll will regenerate the entire site every time you republish. It didn't help that I am using [Less](http://lesscss.org/), which also requires a conversion step. If I make one change to a template, it will have to process nearly 1000 posts. Making changes was a bit of a chore because of this. Two things helped here:

1. Use the [server feature of Jekyll](https://github.com/mojombo/jekyll/wiki/configuration) to get your layout and design stuff sorted locally, before you push it up to your server.
2. keep only a few posts in your `_posts/` directory while refactoring page design. This makes the generation time much more tolerable.
3. Using tools that let me test design changes on a "live" site. I used  [CSSEdit](http://macrabbit.com/cssedit/) a lot for this, and it was very helpful.


### Redirecting old URLs to new ###

Depending on your previous setup, you may need to redirect old URLs to the new ones on your Jekyll site. I do this with an `.htaccess` file on my server (not maintained in Jekyll, although it could be). It handles more than just stuff for Jekyll, but here's the pertinent bits for redirecting:

<script src="https://gist.github.com/899813.js?file=.htaccess"></script>


### Automating build tasks and deployment ###

In my Jekyll directory I have a `_bin/` folder that contains a few scripts. The most important one is `rebuild.sh`, which is what I run when I have finished a post and I'm ready to make it live. The file contains some private info so it's not in [my github repo](https://github.com/funkatron/funkatron.com), but I included it here with the juicy bits redacted:

<script src="https://gist.github.com/899793.js?file=rebuild.sh"></script>

In order, this script:

1. `cd`s to my local jekyll site directory
2. runs a short PHP script to generate a page from an RSS feed
3. generates the site.css file from the .less file
4. runs `jekyll`, which regenerates the site in the `_site` directory
5. when `jekyll` finishes, `rsync`s the contents of `_site` up to the server hosting funkatron.com.

So when I'm happy with this post, I'll just run `_bin/rebuild.sh`, and everything is generated and deployed for me. It's very clean, very reliable, and I know everything that happens. That's nice.

One warning: DO NOT use `rsync`'s `--delete` option if you're deploying into a directory that has other, non-Jekyll-maintained content. I blew away a bunch of files this way, but thankfully had backups. 

Another minor issue is that the RSS feed that is used to generate [`items.html`](http://funkatron.com/items.html) updates way more often than I rebuild the blog, so it's woefully out of date after a day or so. It would probably be better to generate this page in particular with its own cron job, but I haven't been bothered to address this yet. Folks can just [subscribe to the RSS feed](http://funkatron.com/feeds/itemsofinterest) if they're really compelled.


I consider the move from ExpressionEngine to Jekyll for my blog a pretty big success. It removed a lot of unnecessary overhead and maintenance tasks. It also kinda reminded me that publishing content doesn't have to be a complex process. You don't have to make an *application* just to publish stuff online. You just need some HTML pages, and maybe a few scripts to make the tedious stuff a bit easier.

  - [GitHub Repo for Funkatron.com](https://github.com/funkatron/funkatron.com)
