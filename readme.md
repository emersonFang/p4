# Ye Olde Landmark-lover's Order (Y.O.L.O.) App
by Emerson Fang
12/15/2015

## Live URL
<http://p4.emersonfang.me>

## Description
My vision for the "Y.O.L.O" App is a web-site where users can upload landmarks they like or have visited and write short informative
descriptions of the landmark, add URL's of photos (ideally of the landmark), and also write reviews about the landmark.
Guests and other users can view the landmarks, photos, and reviews that users have posted.  Registration is required to interact with
the website's database, but not necessary to view the data.

## Demo


## Details for the teaching team
Login Required to add landmarks, photos, and reviews, but a guest can still view landmarks, photos, and reviews added by other users.
*Login Option 1:
    *Email: jill@harvard.edu
    *Password: helloworld
*Login Option 2:
    *Email: jamal@harvard.edu
    *Password: helloworld

The public/assets/ directory holds the CSS files for the views and the images that I used for the
header.

## Outside code
* External Stylesheets
 * Maybe this is redundant?: http://yui.yahooapis.com/pure/0.6.0/pure-min.css
 * Bootstrap: http://maxcdn.bootsrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css
 * Bootstrap Theme: https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/readable/bootstrap.min.css
* Logic
 * Based a good deal my code on Susan Buck's Foobooks Example App as far as routes, controllers, and views logic, and flash messages is concerned,
    but changed and added many details/complexities of my own.
    *https://github.com/susanBuck/foobooks
 * Condition to randomly pick pictures: http://stackoverflow.com/questions/23456947/how-can-i-select-a-random-entry-from-a-database-using-laravel-4s-eloquent-orm
 * Rounded corners: http://stackoverflow.com/questions/6856711/css-rounded-corners-on-an-image-problem

* Styling
 * Header shadow: http://answers.squarespace.com/questions/2750/drop-shadow-on-header-menu-what-css-is-required
 * Box shadow: http://www.w3schools.com/cssref/css3_pr_box-shadow.asp