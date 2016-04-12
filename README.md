Library
===================

Store books and movies into a database. You can also add books by their bar code with a scanner.

## What you can do

- List and manage all movies and books you possess
- Add locations associated with a picture
- Search books/movies to know where they are in your house
- Search by location to know every books that are stored in your different rooms
- Scan the bar code of your books to retrieves information from the internet and to automatically fullfill the database.
- **Auto mode**:  No need to use your mouse. Just press the scanner button, so it's faster to add hundreds of books fluently.


## Technologies Used

 - Php
 - MySQL
 - Ajax
 - Bought a physical scanner (didn't have a phone back then)
 - Powershell script conecting to [ISBN](http://isbndb.com/) (in prior versions)
 - [Google books Api](https://developers.google.com/books/)
 - Curl Requests

## Powershell

There is also a powershell script to retrieve information with the bar code. The application doesnt't use that script though. It takes an API from isbn to complete that goal. It's faster and easier to use. The ps1 script was only created for the purpose of testing something different.

## Installation

You can download the source code and start it with a php server like wamp. Then, you will have to run the [sql script](https://github.com/Freelix/Library/blob/master/Utils/database/biblio.sql) to create the database.