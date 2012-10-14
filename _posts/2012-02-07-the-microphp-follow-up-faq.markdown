---
layout: post
title: "The MicroPHP Follow-up FAQ"
author: funkatron
published: true
categories:
- PHP
date: 2012-02-07

---

My previous post, [The MicroPHP Manifesto](http://funkatron.com/posts/the-microphp-manifesto.html), resulted in much excitement. In between fits of rage and crying, I found some time to answer folks questions, and also discuss the topic on [the /dev/hell podcast](http://devhell.info) with my cohost [Chris Hartjes](http://littlehart.net). To summarize and address some of the common questions, I felt I should write a small FAQ.

Got a question? [Ask me](/contact.html). I'll add additional entries here as things come up.

<hr>

### So you think full-stack frameworks suck?

  **No.** I think sometimes they're very appropriate. It depends on your needs: will the pros you get with library/component/framework X outweigh the negatives? If so, it's probably a good choice. If not, it's probably not.

### You need a large framework to enforce best practices!

  **Sometimes you do.** My experience at FictiveKin has been that our small team is able to work faster, smarter, and more efficiently by minimizing the size of our PHP codebase and removing all unnecessary layers of abstraction. In some cases that meant not doing certain tasks in PHP anymore (almost all HTML generation was moved to the browser). In others, it meant ripping out a bunch of code and replacing it with a simpler solution that required far less boilerplate and replication. We still kept some code that had more dependencies than we'd like because the wins we get with it outweigh the downsides.

  I've certainly seen situations where choosing a popular full-stack framework is a better idea. As teams get larger, enforcement of coding standards and not doing Dumb Shit becomes harder. Hiring and training engineers is usually easier with popular, full-stack frameworks. On the other hand, we've found that devs coming from non-PHP backgrounds liked how quickly they can be productive with simpler libraries and frameworks. Your mileage may vary.

### So you're saying we should write our own framework/libraries/components?

  **Good God no.** There is lots of very good, well-written code out there that's already solved the problem you're facing. Most of the time I don't want to try to solve an issue like oAuth request signing, because it makes my brain hurt and I'd rather focus on building stuff. So, I'll look for an existing solution that fits my needs first. I sometimes choose to write something from scratch because the existing solutions (that I can find – discovery is a whole other issue) don't fit well with my existing application structure, or I feel it will introduce more maintenance issues than I'm comfortable with.

### You should check out my microframework!

  Sure. Generally I think **people should work on writing libraries/components**, personally. We have plenty of framework choices. But this is PHP, so you have to write your own framework sometime.

### Is "X" a microframework?

  Long answer: I tend to believe that the reference implementation of "microframework" is [Sinatra](http://www.sinatrarb.com/). Routing, request/response objects, sessions, maybe some hooks for template rendering. Generally I think the inclusion of an ORM is a clear sign of non-micro-ness.

  Short answer: **I don't care**, really – and you shouldn't either. If it works for you, awesome.

### How do you choose what gets listed in [the MicroPHP code collection](http://microphp.org/code.html)?

  Generally I think about these things:

  1. Does it try to solve one task, or a small set of closely related tasks?
  2. Would it be easy to use with almost any existing code base?
  3. Is the code as short as it can be, while still being clear and easy to follow?

  None of these are hard and fast rules, though. I encourage people to [share things with me](mailto:coj@funkatron.com?subject=MicroPHP) they think others would find useful.

### Why do you hate Rush?

  **I don't.** I like some of their songs, but don't own any of their work. I also think they're incredibly smart, talented musicians. My point was to suggest there are other valid approaches, not to reject complexity outright.