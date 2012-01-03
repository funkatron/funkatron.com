---
layout: post
title: "The MicroPHP Manifesto"
author: funkatron
published: true
categories:
- PHP
date: 2012-01-03

---

The standard line about the history of Punk is that it was a reaction to the excesses of modern rock, particularly progressive rock of the time. The [reality](http://www.amazon.com/Please-Kill-Me-Uncensored-History/dp/0140266909) is undoubtedly more complex, but I suspect there is some truth to that. Rock n roll did seem to be the realm of Golden Gods in the late 60s and 70s, inaccessible to average folk. The contrast between bands like Rush and Black Flag –– both supposedly playing "rock" –– was extreme.

For fun, let's take a look at Rush drummer Neil Peart's drum kit:

![Neil Peart from Rush](http://funkatron.com/media/neil-peart1.jpg)


Now, here's Black Flag playing in LA in 1979:

![Black Flag](http://funkatron.com/media/black-flag-whisky-a-go-go2-590x448.jpg)

You can fit the entirety of Black Flag in the space of Neil Peart's drum kit. And they would still play awesome shit and rock you the fuck out.

In the past few years, the PHP Zeitgeist seems like it's been moving in the Neil Peart direction. Lots of work by lots of smart people is going into complex, verbose solutions. Lots of files, lots of nested directories, and lots of rules. I frequently see PHP libraries/components that look like this:

<script src="https://gist.github.com/1555472.js"> </script>
<noscript><a href="https://gist.github.com/1555472">https://gist.github.com/1555472</a></noscript>

All that, just to *start* your application.

It doesn't mean this approach is bad, per se. But when I see it, I have a visceral negative reaction. My brain screams

<span style="font-size:24pt">FUCK.</span>

<span style="font-size:24pt">THAT.</span>

<span style="font-size:24pt">SHIT.</span>

I can't do it. I don't want it. And I don't think we have to do it this way to do cool things and build awesome stuff.

The approach I've been taking lately is to start with as lightweight a foundation as possible, in the form of a "microframework." A few of these exist for PHP (of course), including [Slim](http://www.slimframework.com/), [Epiphany](https://github.com/jmathai/epiphany), [Breeze](https://github.com/whatthejeff/breeze), [Limonade](http://www.limonade-php.net/), and others. For additional functionality, I pull in lightweight libraries that help me accomplish only the tasks I need. Clarity and brevity are my top considerations.

My other big consideration is the **commitment** I make when I use code I didn't write. Typically I don't have time to do a full code audit on libraries, so there's a level of trust that goes with it. And each dependency means more trust. Not just that there aren't bugs (I expect that if they're anything like me), but security issues – both whether they exist, and how they will be handled. Will an announcement go out to a mailing list? How long will security fixes be provided that don't break backwards compatibility? Will I have to upgrade *all* my dependencies if I upgrade to the next PHP point release? And all of that assumes the author will have the time and motivation to provide prompt fixes. If they don't, you've just added a bunch of technical debt to your codebase.

Finding lightweight libraries that don't pull in lots of additional code dependencies is much harder than it should be. Mostly I think that's attributable to PHP devs being more interested in framework-specific development. Some work is being done to make mature frameworks less monolithic, and many devs on Twitter have recommended Symfony components as an option. Unfortunately, I think my definition of "lightweight" is not the same as theirs.

Here's the [`cloc`](http://cloc.sourceforge.net/) output for a git clone of the [symfony2 HTTP Kernel component](https://github.com/symfony/HttpKernel):

	Mon Dec 26 19:42:23 EST 2011
	coj@PsychoMantis ~/Sites > cloc HttpKernel
	      94 text files.
	      93 unique files.
	      12 files ignored.

	http://cloc.sourceforge.net v 1.53  T=0.5 s (164.0 files/s, 18736.0 lines/s)
	-------------------------------------------------------------------------------
	Language                     files          blank        comment           code
	-------------------------------------------------------------------------------
	PHP                             72           1175           3440           4290
	Bourne Shell                    10             56            155            252
	-------------------------------------------------------------------------------
	SUM:                            82           1231           3595           4542
	-------------------------------------------------------------------------------

Here's the same for the Slim framework:

	Mon Dec 26 19:42:27 EST 2011
	coj@PsychoMantis ~/Sites > cloc Slim
	      54 text files.
	      51 unique files.
	      13 files ignored.

	http://cloc.sourceforge.net v 1.53  T=0.5 s (82.0 files/s, 17752.0 lines/s)
	-------------------------------------------------------------------------------
	Language                     files          blank        comment           code
	-------------------------------------------------------------------------------
	PHP                             31            660           4473           3280
	Bourne Shell                    10             56            155            252
	-------------------------------------------------------------------------------
	SUM:                            41            716           4628           3532
	-------------------------------------------------------------------------------

and the Epiphany framework:

	Mon Dec 26 19:42:30 EST 2011
	coj@PsychoMantis ~/Sites > cloc Epiphany
	      83 text files.
	      70 unique files.
	      31 files ignored.

	http://cloc.sourceforge.net v 1.53  T=0.5 s (102.0 files/s, 5246.0 lines/s)
	-------------------------------------------------------------------------------
	Language                     files          blank        comment           code
	-------------------------------------------------------------------------------
	PHP                             40            218            309           1632
	Bourne Shell                    10             56            155            252
	HTML                             1              0              0              1
	-------------------------------------------------------------------------------
	SUM:                            51            274            464           1885
	-------------------------------------------------------------------------------

When there are more files and lines of code in your component than in my entire base framework, I can't call it "lightweight."

It doesn't mean that stuff is bad, in the grand scheme of things. It doesn't mean it has no value or is the wrong approach for many. But it's the wrong approach for me, for sure. And I don't think I am alone.

I don't want to be the prog rock superstar, writing a pretentious rock opera. I want to play shitty power chords in a punk rock band that plays shows in a VFW lodge with no stage, and leaves you so fucking pumped that you go out and form your own band. That's the coder I want to be.

I don't want to be [Neil Peart](http://www.drummerworld.com/pics/drum43/neilpeart7.jpg). I want to be [Gregg Ginn](http://synthesis.net/wp-content/uploads/2008/06/greg2.jpg).

So I wrote this. A "micro PHP manifesto," if you will. I plan to use it to guide my PHP dev. Maybe you will find it useful as well.

**I am a PHP developer**

* I am not a Zend Framework or Symfony or CakePHP developer
* I think PHP is complicated enough

**I like building small things**

* I like building small things with simple purposes
* I like to make things that solve problems
* I like building small things that work together to solve larger problems

**I want less code, not more**

* I want to write less code, not more
* I want to manage less code, not more
* I want to support less code, not more
* I need to justify every piece of code I add to a project

**I like simple, readable code**

* I want to write code that is easily understood
* I want code that is easily verifiable
