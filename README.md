# <ins>Examination Website</ins>

## <ins>Description</ins>
This is a project that I developed for my girlfriends highschool examination. It is used as a 
common platform for all who are invited. It contains necessary information and a wishlist. 
All photos and information have been replaced with placeholders due to privacy. 

The website was developed using HTML, CSS, PHP and a tiny bit of Javascript. PHP was mainly used for the backend, while
HTML and CSS - of course - was used for the frontend. The requirement, design, development and deployment phases of this
project took combined about 3 months. 

## <ins>How can I test the page?</ins>
In order to test the page for free, the best way is to download software such as <b>MAMP</b> from their
official [website](https://www.mamp.info/en/windows/). When installed, follow these simple steps:

### Setup root folder
Open MAMP and click on <b>MAMP->Preferences->Server</b>. Here you can choose the documentation root, which has to be the cloned project in order to work.
Press "OK".
### Setup SQL-database
When the root folder has been set, click on <b>"Start Server"</b> and wait for it to turn on (indicated by lights).
When the server is on, click on <b>"Open WebStart page"</b>. On the page you'll have to scroll down a bit until you see the header
<b>"MySQL"</b>. Click on the link with the label  <b>"phpMyAdmin"</b>. You now need to create a database called <b>"examination"</b> with 3 tables.
1. A table called  <b>"gift"</b>. It has the columns: "id", "name", "taken" "guest_id" that are of type int, varchar(100), bit(1) and int.
2. A table called  <b>"guest"</b>. It has the columns: "id", "firstName", "lastName", "email", "pass", "admin" that are of type int, varchar(50), varchar(50), varchar(50), char(60) and bit(1).
3. A table called  <b>"link"</b>. It has the columns "id", "address_key" with that are of type int and varchar(20).

## <ins>Improvements to be made</ins>
There are a lot of improvements that can be made. First of all, PHP is old and insecure. A change of programming language 
for the backend would be a good start. Another improvement would be to develop the page using 
iterative development as it would make it easier for others to see what they like and do not like about each separate page. 
My girlfriend had no clue how she wanted each page to look like, so it would make quite a lot of sense to use iterative development. 
Something to keep an eye on next time.
