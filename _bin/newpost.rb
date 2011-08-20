#!/usr/bin/env ruby

unless ARGV[0]
  puts 'Usage: newpost "the post title"'
  exit(-1)
end

# change these as you see fit
format = 'markdown'
posts_path = '/Users/coj/Sites/funkatron_jekyll/_posts'

date_prefix = Time.now.strftime("%Y-%m-%d")
postname = ARGV[0].strip.downcase.gsub(/ /, '-')
post = "#{posts_path}/#{date_prefix}-#{postname}.#{format}"

header = <<-END
---
layout: post
title: "#{ARGV[0]}"
author: funkatron
tags: "spaz"
published: true
categories:
- General
date: #{date_prefix}

---

END

File.open(post, 'w') do |f|
  f << header
end

system("mate", "-a", post)
