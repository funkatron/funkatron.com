---
layout: post
title: "When is Design Evil?"
author: funkatron
published: true
categories:
- Design
date: 2012-10-13

---

[!["Evil Pandas by Bill Dickinson"](http://farm8.staticflickr.com/7067/6902110466_22cdd93c8a_z.jpg)](http://www.flickr.com/photos/skynoir/6902110466/)

[Ben Pieratt](http://pieratt.com/) gave a compelling talk at Brooklyn Beta this year about his experiences founding, and then leaving, [Svpply](http://svpply.com/). He bravely described both his successes and failures as a founder, and it was one of the highlights of the conference.

Ben made an interesting assertion during his talk that I've been chewing on for a few days since: that he thinks that *people* are his medium, not the web or paper or video or what have you. As a designer, his job is to influence user behavior.

My initial reaction to this was negative. When we're talking about influencing people, I usually think of Evil Shit. Stuff like the world in [They Live](http://criticalcommons.org/Members/ccManager/clips/theylivearglasses.mp4/view), where advertising and media all work to suppress independent thought and promote consumption. That was satire, but based firmly in the reality of [government](http://www.boston.com/news/nation/washington/articles/2007/01/28/libby_case_witness_details_art_of_media_manipulation/) and [the private sector's](http://trustmeimlying.com/) [manipulation of user behavior via the media](http://en.wikipedia.org/wiki/Media_manipulation). And in interface design, plenty of Evil Shit is done to influence user behavior, like [aping the look of Windows in popups](http://webcache.googleusercontent.com/search?q=cache:http://news.bbc.co.uk/2/hi/technology/7633402.stm) or [making it hard to choose free options](http://www.stefanwobben.com/persuasion/persuasion-or-deception/). Many more examples are mentioned in the slide deck ["Usability Engineering for Evil"](http://classes.engr.oregonstate.edu/eecs/summer2011/cs352/lecture25-evil.pdf).

When I've done web design, I've typically focused on the utility of what I'm making, in order to empower the user to accomplish his or her goals. I've always been suspicious of attempts to appeal to one's emotions to influence behavior, particularly when it lacks any logical argument. For example, I've been happy with Apple's products and continue to purchase them *despite* having advertising that consistently turns my stomach with its strong emphasis of style over substance.

But design exists somewhere in the overlap of utility and evoking emotion. The aesthetics of a thing always evoke some kind of emotional response in the user, subtle as it may be. I choose to use some applications over others because I find the aesthetic choices more appealing, even when they have similar functionality.  I generally find it more pleasant -- or at least less unpleasant -- to use a utility when the UI is both effectively engineered and aesthetically pleasing.

Poor aesthetics in a vendor's web site often lead me to dismiss them as an option. Compare the Hover splash page:

[!["Hover splash page"](../media/th_hover_splash.png)](../media/hover_splash.png)

To this one from UglyBill:

[!["UglyBill splash page"](../media/th_uglybill_splash.png)](../media/uglybill_splash.png)

I find Hover not only more aesthetically pleasing, but both easier to use and *more trustworthy* because of the level of effort put into the design.[^1] Of course, Hover at one time [stored passwords as plain text](), so it's not as if good design itself indicates good stewardship.

[^1]: I actually use [Gandi.net](http://gandi.net) for domain registrations. I find their web site a bit harder to use, but their "no bullshit" slogan appeals to me, and they never try to up-sell me on anything. Consider this a recommendation.

Still, there's a difference between making a utility appealing to help the user accomplish what he or she wants, and design that gets the user to do what *you* want he or she to do. The latter is fraught with many more ethical issues.

I'm a big fan of Soviet propaganda art from the 1930s and 40s. This is a good example of the period:

[!["Liberated woman – build up socialism!"](../media/th_liberatedwoman.jpg)](../media/liberatedwoman.jpg)

Compare this to the familiar Obama "Hope" poster:

[!["Hope"](../media/th_obama-hope-sheppard-feirey1.png)](../media/obama-hope-sheppard-feirey1.jpg)

Both of these posters want to influence and inspire in similar ways. Most of us would probably agree that supporting the Soviet regime of the period was not a great idea – even worse than supporting Obama! If we can say it supported an "evil" regime, is the design itself "evil"?

A similar, but more extreme, approach is used in recent anti-smoking and methamphetamine use campaigns:

[!["Be Careful Not To Cut Your Stoma"](../media/th_CDC-Anti-Smoking-Campaign_2.png)](../media/CDC-Anti-Smoking-Campaign_2.png)

[!["But On Meth It Is"](../media/th_2029.jpg)](../media/2029.jpeg)

Since smoking tobacco and taking methamphetamine is generally regarded as bad for you by most people, we're generally okay with these campaigns, despite their appeal to extreme emotions. But they don't present anything like a logical argument – it's purely scare tactics, just like those [used by William Randolph Hearst to demonize marijuana in the 1930s](http://en.wikipedia.org/wiki/Legal_history_of_cannabis_in_the_United_States#Marijuana_Tax_Act_.281937.29). That's not to say the approach isn't justified in some cases, but I'm not personally comfortable with it as anything but a last resort.

Propaganda is one thing, but interface design can be equally problematic. The [Dark Patterns wiki](http://wiki.darkpatterns.org) has lots of good examples of UIs designed to get people to do things they probably shouldn't. The wiki calls it "tricking" users, but I'm guessing the designers behind many of these would have used words like "entice" and "encourage." And many of these aren't obviously nefarious; the involve things like requiring opt-out, defaulting to sharing more data than less, and reducing the visibility of certain UI elements -- stuff that's commonly discussed in web app development.

Ultimately, if you're good at your job, you have to become a steward. Developers are stewards of their users' data. Designers are stewards of their users' emotions and behavior. Users put their trust in us; respecting that trust means considering the ethics of our design and development choices. As Dennis Kardys says in [The Ethics of Influence and Manipulation](http://www.robotregime.com/index.php/articles/view/influence/) (which deals with many of these same issues much more intelligently than I do here):

> It can be convenient to do your job without thinking about the bigger picture. It’s easier to be passive than to be confrontational, and it’s easy to place the weight of responsibility onto your boss or the client. But the truth is that we alone are responsible for the things we create and contribute to making.

We owe our users that much.