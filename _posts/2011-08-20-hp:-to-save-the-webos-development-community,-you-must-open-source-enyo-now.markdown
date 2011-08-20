---
layout: post
title: "HP: To Save The webOS Development Community, You Must Open-Source Enyo Now"
author: funkatron
published: true
categories:
- Spaz
- webOS
- javascript
- Enyo
date: 2011-08-20

---

[![Hourglass (86/365)](http://farm4.static.flickr.com/3658/3391592144_2a21d10f53_z.jpg)](http://www.flickr.com/photos/swimparallel/3391592144/ "photo by swimparallel")

I've talked previously about why Enyo needs to be FOSS. I won't repeat those arguments here, but I'd encourage you to [read them again](http://funkatron.com/posts/why-hp-needs-to-make-enyo-open-source-and-cross-platform.html).

Done? Good.

Recent events make this even more important. With HP killing all hardware that runs webOS, and Enyo locked to webOS due to the license[^1], there's no reason for devs to stay. It's a closed platform with no hardware.

webOS dev wasn't really sustainable commercially anyway. But now, with no hardware and no roadmap, **you're going to lose your dev community entirely.**[^2]

No matter what, you will lose a large portion of your webOS dev community. But here's why **opening Enyo will allow you to hold onto a core during this transitional period**:

- It will allow current webOS devs to create desktop and mobile applications that will run on webOS with little or no work.
- It will likely attract *more* developers to Enyo, given that JavaScript development community largely abhors closed-source libraries and frameworks
- When webOS is up and running with a new hardware partner, these Enyo apps will be able to launch with the new devices

**Here's what you should do**

1. Release Enyo under a liberal open source license (Apache, MIT, etc)
2. Provide documentation and examples of using Enyo to develop desktop apps (via Titanium Desktop or AIR Desktop) and cross-platform mobile apps (via PhoneGap)
3. Get your top dev rel folks, like Dave Balmer, talking about Enyo and advocating its use at JS community events

To be clear: the longer you wait, the more you lose. 6 weeks from now, this is a lost cause. **A quick, decisive move** here will give webOS devs a reason to stay interested in the platform.

**Delay, and you lose them all**.

_photo by [swimparallel](http://www.flickr.com/photos/swimparallel)_

[^1]: Enyo runs great on any Webkit platform. We make builds of Spaz HD as a desktop app using Titanium Desktop, and I use it on a daily basis – much more than I use the TouchPad builds. We've also done experimental builds and had success packaging Spaz HD for Android using PhoneGap

[^2]: much of this is because of the incredibly poor wording of the PR coming from HP, but that's another story

