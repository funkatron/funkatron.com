---
layout: post
title: "Building a Tumblelog with Gimme Bar and PHP"
author: funkatron
published: true
categories:
- PHP
- "Gimme Bar"
date: 2011-11-05

---

[![Tumble by rovingI](http://farm3.static.flickr.com/2418/1641508502_fb2a1c607b_z.jpg?zz=1)](http://www.flickr.com/photos/rovingi/1641508502/ "Tumble by rovingI")

One of the coolest things about working on [Gimme Bar](http://gimmebar.com) has been the opportunity to build a platform. While most folks interact with our service via the web site, the site is just one application built on top of the Gimme Bar content collection and curation system. Our web site interacts with the system via our [HTTP API](https://gimmebar.com/api/v0), which is open to everyone, not just our internal team. That means that anyone can build applications on top of our platform to suit their own needs or interests.

To demonstrate this, I built [**GimmeMe**](https://github.com/funkatron/GimmeMe), a simple [tumblelog](http://kottke.org/05/10/tumblelogs)-type web app that's powered by Gimme Bar. It uses methods in our API that don't require authentication, so you don't need to register with us to use it. And it's a drop-in, set-one-option-and-go install, so you don't need to fiddle with a bunch of stuff to use it (but you can if you want).

I have a running demo on my web server at <http://funkatron.com/GimmeMe>. It shows the 50 most recent pieces of content I've grabbed with [Gimme Bar](http://gimmebar.com).

### Installation

To install the web app yourself, you'll need a web server with:

* PHP 5.2.x or above
* APC 3.0.8 or above

Install as follows:

1. Download the source code as a `.zip` or `.tar.gz` from [the project's download page](https://github.com/funkatron/GimmeMe/downloads)
2. Decompress the files somewhere under your web server's document root
3. Edit the `$config['username']` value in `index.php`
4 .Optionally set the `$config['gb_addthis_pubid']` value to include [AddThis](http://addthis.com) widgets, if you're into that kind of thing
5. Load the appropriate URL in your web browser to view the install on your web server

### The Code

If you're a developer type, you'll probably want to poke around [the source code in the GitHub repo](https://github.com/funkatron/GimmeMe). The main work is done by `libs/GimmeMe.php`, which handles grabbing data from the API, caching it, and rendering the HTML.

<script src="https://gist.github.com/1341981.js?file=GimmeMe-getAssets.php"></script>

In `GimmeMe::getAssets()`, we load the data using the [`GET /public/assets/:username`](https://gimmebar.com/api/v0#GET--public-assets--username) method. This returns a JSON object with an array of asset data in the `records` propert. We decode the response JSON into a PHP object (the `$assets` variable), and add a couple properties that we'll use in the HTML template. Then we cache the object in APC, and return it. Next time around, if the cached object has not expired, it will just pull it from APC and return it, so we don't make more requests to the API than necessary.

<script src="https://gist.github.com/1341984.js?file=GimmeMe-render.php"></script>

The `GimmeMe::render()` method loops through the assets we retrieved and makes each one into a [`GimmeAsset`](https://github.com/funkatron/GimmeMe/blob/master/libs/GimmeAsset.php) object. `GimmeAsset`s are view objects used by [the Mustache templating library](https://github.com/bobthecow/mustache.php) to encapsulate display logic, so we set up special methods or data massage in there. After we set those up for each asset, the entire data structure is passed to the Mustache library for rendering, using [the 'page' template defined in `templates\templates.php`](https://github.com/funkatron/GimmeMe/blob/master/templates/templates.php#L4).

Right now I also am including a [a simple router class](http://blog.sosedoff.com/2009/09/20/rails-like-php-url-router/) at `vendors\Router.php`. We'll need this for stuff that would involve different URLs, like paging back through assets or loading single-asset pages, but I haven't quite gotten that far.

<hr>

I'd be remiss in not mentioning <http://hereslookingathue.com/>, a collection of beautiful imagery collected and organized by Gimme Bar user [hereslookingathue](https://gimmebar.com/user/hereslookingathue). It's another cool example powered by our public API methods.

Hopefully this gives you a taste of what's possible with the Gimme Bar API. Most read-only things, like embeddable widgets or reposting tools, would be easy to do with just the public API methods. Beyond that, the vast majority of our system is exposed through the public API, so powerful collection, replication, and organization applications can be built.

If you have questions or comments, please hit us up on [Freenode](http://freenode.net/) at [#gimmebar-api](irc://irc.freenode.net/gimmebar-dev), or email us at <api@gimmebar.com>.

*Photo by [rovingI](http://www.flickr.com/photos/rovingi/1641508502/)*
