---
layout: post
title: "Why HP Needs to Make Enyo Open Source and Cross-Platform"
author: funkatron
published: true
categories:
- Spaz
- webOS
- Enyo
- JavaScript
- Open source
date: 2011-05-16

---

[!["Why webOS?"](https://img.skitch.com/20110516-tcib4nnnqi26phwmxnr7keukkx.png)](https://img.skitch.com/20110516-ke64a7h2151jnyiabpbwwe81cc.png "Why webOS?")

*Yes, I did say "needs."*

**Updated with more info on PhoneGap support – Monday; May 16, 2011, 4:55 EDT**

Enyo is a great framework, built by people who understand JavaScript and the nature of the JS community.  It's also a cross-platform framework that runs great on most WebKit engines – HP themselves have repeatedly shown it running within the Chrome browser, and anecdotal reports have it running decently on Android and iOS.

However, HP has still not made it clear what the licensing terms will be for Enyo. Will it use a liberal open-source license like Apache or MIT? Will devs be allowed to deploy on other webkit platforms (mobile and desktop)? While hundreds of devs are working with Enyo already, HP still hasn't addressed this. 

Enyo an open source, cross-platform dev framework makes a ton of sense. Here's why:

### 1. Mobile devs don't want to be locked into a single platform

There's a reason why people are interested in technologies like PhoneGap and Titanium Mobile: because it allows deployment on multiple mobile platforms. The current mobile landscape doesn't offer an obvious first platform choice, and there's significant revenue to be made from second and third platforms. Bringing an application to market is significantly faster with a cross-platform technology stack.

webOS particularly can't afford to be an island. Enyo as a webOS-only tech will be regarded as an interesting framework that's impractical for their own use. Enyo as a cross-platform tech – probably combined with PhoneGap – can instead be a serious choice for all mobile devs, and *will result in more webOS apps being developed*.


### 2. It raises awareness of webOS in the JavaScript community

Most libraries for mobile web/JS mobile app dev don't take webOS into account. If they do, it's a token gesture. They don't because webOS really isn't on their radar as a platform – despite the appeal of a platform built on webkit, v8 and Node.js. Coming out with a top-tier cross-platform app development framework will immediately raise the awareness of webOS, and provide lots of opportunities to position webOS as *the* platform for JavaScript app dev.


### 3. JavaScript is driven by openness and diversity

The thing that JavaScript has thrived upon has been its openness and diversity of platforms. JS runs almost everywhere, and the accessibility of information and libraries is unbeatable. This is because it is an open standard, and driven by open source developers. Openness is in the DNA of JS devs. It is *expected.* JS devs are leery of non-open tech.

To appeal to JS devs, Enyo needs to embrace the nature of the community. That is open and liberally licensed. Devs will love it and run with it, and come up with stuff HP never imagined, to the benefit of both Enyo and its developers.


### 4. It expands the market for pay-for tooling and training

With a mature, top-tier cross-platform framework, lots of opportunities open up for commercial tools and training. Being a member of the open source community for 10+ years, I've found that most FOSS devs will pay for tools and training. This market is *much* larger if Enyo is not webOS-only.


### 5. It demonstrates that HP/Palm "gets" the Web

Under "Why webOS" on the webOS dev site, HP lists "Cross Platform" as one of the major attractions. To quote:

> The primary webOS app runtime is built on ubiquitous web technologies, so you can write code that runs with minor modifications on other platforms.

Neutering Enyo with legal restrictions seems at best hypocritical. Worse, HP has shown little commitment to improving the state of webOS support with major JS mobile app technologies like PhoneGap and jQuery Mobile[^1]. It's understandable that they'll put the most time into homegrown tech, but it will be a major missed opportunity if they don't do everything they can to attract devs interested in cross-platform, web-oriented tech. And webOS can't afford many more missed opportunities, IMHO.

**Update:** Dave Balmer at HP [reports](http://twitter.com/balmer/status/70229567670980608) that Phonegap 0.9.5 contains significant contributions to improve webOS support, and [mentions](http://twitter.com/#!/balmer/status/70230787273924611) ongoing efforts to aid other major mobile/touch projects. This is very encouraging, and **I hope HP gives the Dev Relations team the resources needed to do this right**.


### 6. It doesn't change what makes webOS special

What sets webOS apart is not just the framework you develop in: it's the way applications can run simultaneously, interact with one another, and interact with the Web. No other platform does that as well, and nothing in Enyo brings those capabilities to other platforms. webOS is still *the* platform that truly embraces the open, interconnected Web.

We're in the middle of building a new version of [Spaz](http://getspaz.com) on top of Enyo. My hope is that I will be allowed to use it as *the* single codebase for all versions: desktop, mobile, and tablets. But I guarantee you that **Spaz in Enyo will run best on webOS**, and take advantage of webOS-specific capabilities.


An open, cross-platform Enyo is a win-win-win: for webOS, for developers, and for users. By not encumbering Enyo with significant legal restrictions, HP will go a long way to ensuring the viability *and vitality* of webOS as a platform for years to come.


[^1]: For example, HP apparently was unaware of [serious rendering issues in jQuery Mobile](https://github.com/jquery/jquery-mobile/issues/1337) until the webOS development community raised a stink about it. It also seem that HP has done little to ensure that PhoneGap runs well on, and is well-documented for, webOS – confusing when the company specifically mentions PhoneGap in their literature.