<?php

/*
* README
* ======
*
* This is simple source code for bookstore application.
* The functional requirement that you needed to help you understand the user story has been written.
*
* Your mission is :
*
* 1. Complete these source code at "PLACE YOUR CODE HERE" parts and run them without any error.
* 2. The result has to be:
*    1:true
*    2:true
*    3:true
*    4:true
*    5:true
* 3. Send the source code file with your answers.
*/


// PHP v5.4
$app = new TestApplication;
$app->run();



class TestApplication {


    public function run() {

        $shop  = new Shop;


        $books = array(
            new Book('The Fellowship of the Ring', 'J.R.R. Tolkien'),
            new Book('The Two Towers', 'J.R.R. Tolkien'),
            new Book('The Return of the King', 'J.R.R. Tolkien'),
            new Book('The Hobbit', 'J.R.R. Tolkien'),
            new Book('Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling'),
            new Book('Harry Potter and the Chamber of Secrets', 'J.K. Rowling'),
            new Book('Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling'),
            new Book('Harry Potter and the Goblet of Fire', 'J.K. Rowling'),
            new Book('Harry Potter and the Order of the Phoenix', 'J.K. Rowling'),
            new Book('Harry Potter and the Half-Blood Prince', 'J.K. Rowling'),
            new Book('Harry Potter and the Deathly Hallows', 'J.K. Rowling'),
        );


        foreach ($books as $book) {
            $shop->bookAdd($book);
        }



        // Ahmad goes to the bookstore.
        // He looks for a book title "Two Towers"
        // If the book is there, he puts it on book cart.

        $ahmad = new Person('Ahmad Ramadhan');

        $available = $shop->bookIsAvailable('The Two Towers');

        if ($available) {

            $book = $shop->bookGet('The Two Towers');
            $ahmad->addToBag($book);

            echo "1: true";

        } else {

            echo "1: false";
        }

        echo "\n";


        // Ahmad goes to bookcase collection from author J.K. Rowling
        // He looks for a book title "Harry Potter and The Goblet of Fire" from author J.K Rowling
        // If the book is there, he puts it on book cart.


        $rowlingBooks = $shop->bookListByAuthor('J.K. Rowling');

        if (in_array('Harry Potter and the Goblet of Fire', $rowlingBooks)) {

            $book = $shop->bookGet('Harry Potter and the Goblet of Fire');
            $ahmad->addToBag($book);

            echo "2: true";

        } else {

            echo "2: false";
        }

        echo "\n";


        // Ahmad has finished choose the books and goes to cashier.
        // He checked the bookcart and sees that there are 2 books on bookcart

        if ($ahmad->countBag() == 2) {

            echo "3: true";

        } else {

            echo "3: false";
        }

        echo "\n";

        // Ahmad finished buy the books.




        // Bayu goes to the bookstore.
        // He looks for a book that he only remembers part of the title is "The King" in entire bookcase.
        // After he finds 1 book with title matched, he puts in on bookcart.

        $bayu = new Person('Bayu Sakti');

        $books_theking = $shop->bookListByTitleContains('The King');

        if (count($books_theking) > 0) {

            $book = $shop->bookGet($books_theking[0]);
            $bayu->addToBag($book);

            echo "4: true";

        } else {

            echo "4: false";
        }

        echo "\n";


        // Accidentally, He looks new arrival of the newest Harry potter's book series.
        // Then he put it on bookcart and turn book "The Return of The King" back to bookcase.


        $available = $shop->bookIsAvailable('Harry Potter and the Deathly Hallows');

        if ($available) {

            $book = $shop->bookGet('Harry Potter and the Deathly Hallows');
            $bayu->addToBag($book);


            $bayu->removeFromBag('The Return of the King');

        }



        // Bayu has finished choose the books and goes to cashier.
        // He checked the bookcart and sees that there is 1 book on bookcart

        if ($bayu->countBag() == 1) {

            echo "5: true";

        } else {

            echo "5: false";
        }

        echo "\n";

        // Bayu finished buy the books.

    }
}


class Shop {
    public $list = [];

    public function bookAdd($book)
    {
        array_push($this->list, $book);
    }
}


class Book {

   

}



class Person {

    
}

