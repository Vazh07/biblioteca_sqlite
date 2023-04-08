CREATE TABLE "author" (
    "id"     INTEGER,
    "author"   TEXT,
    "nationality"   TEXT,
    "birth_year"   INTEGER,
    "fields" TEXT,
    "books" TEXT,
    PRIMARY KEY("id")
);
insert into author values(1,"Abraham Silberschatz","Israelis / American",1952,"Database Systems, Operating Systems","[['book_id'=>1, 'book_name'=>'Operating System Concepts'],['book_id'=>2, 'book_name'=>'Database System Concepts']]");
insert into author values(2,"Andrew S. Tanenbaum","Dutch / American",1944,"Distributed computing, Operating Systems","[['book_id'=>3, 'book_name'=>'Computer Networks'],['book_id'=>4, 'book_name'=>'Modern Operating Systems']]");
  [
    ['id'=>1, 'author'=>'Abraham Silberschatz', 'nationality'=>'Israelis / American', 'birth_year'=>1952, 'fields'=>'Database Systems, Operating Systems', 'books'=>[['book_id'=>1, 'book_name'=>'Operating System Concepts'],['book_id'=>2, 'book_name'=>'Database System Concepts']]],
    ['id'=>2, 'author'=>'Andrew S. Tanenbaum', 'nationality'=>'Dutch / American',  'birth_year'=>1944,  'fields'=>'Distributed computing, Operating Systems',  'books'=>[['book_id'=>3, 'book_name'=>'Computer Networks'],['book_id'=>4, 'book_name'=>'Modern Operating Systems']]]
  ]

CREATE TABLE "book" (
    "id"     INTEGER,
    "title"   TEXT,
    "edition" TEXT,
    "copyright" INTEGER,
    "language" TEXT,
    "pages" INTEGER,
    "author" TEXT,
    "author_id" INTEGER,
    "publisher" TEXT,
    "publisher_id" INTEGER,
    PRIMARY KEY("id")
);
insert into book values(1,"Operating System Concepts","9th",2012,"ENGLISH",976,"Abraham Silberschatz",1,"John Wiley & Sons",1);
insert into book values(2,"Database System Concepts","6th",2010,"ENGLISH",1376,"Abraham Silberschatz",1,"John Wiley & Sons",1);
insert into book values(3,"Computer Networks","5th",2010,"ENGLISH",960,"Andrew S. Tanenbaum",2,"Pearson Education",2);
insert into book values(4,"Modern Operating Systems","4th",2014,"ENGLISH",1136,"Andrew S. Tanenbaum",2,"Pearson Education",2);
  [
    ['id'=>1,  'title'=>'Operating System Concepts', 'edition'=>'9th', 'copyright'=>2012, 'language'=>'ENGLISH',  'pages'=>976, 'author'=>'Abraham Silberschatz', 'author_id'=>1, 'publisher'=>'John Wiley & Sons', 'publisher_id'=>1],
    ['id'=>2,  'title'=>'Database System Concepts', 'edition'=>'6th', 'copyright'=>2010, 'language'=>'ENGLISH',  'pages'=>1376, 'author'=>'Abraham Silberschatz', 'author_id'=>1, 'publisher'=>'John Wiley & Sons', 'publisher_id'=>1],
    ['id'=>3,  'title'=>'Computer Networks', 'edition'=>'5th', 'copyright'=>2010, 'language'=>'ENGLISH',  'pages'=>960, 'author'=>'Andrew S. Tanenbaum',  'author_id'=>2, 'publisher'=>'Pearson Education', 'publisher_id'=>2],
    ['id'=>4,  'title'=>'Modern Operating Systems', 'edition'=>'4th', 'copyright'=>2014, 'language'=>'ENGLISH',  'pages'=>1136, 'author'=>'Andrew S. Tanenbaum', 'author_id'=>2, 'publisher'=>'Pearson Education', 'publisher_id'=>2]
  ]

CREATE TABLE "publisher" (
    "id"     INTEGER,
    "publisher"   TEXT,
    "country"   TEXT,
    "founded"     INTEGER,
    "genre"  TEXT,
    "books"  TEXT,
    PRIMARY KEY("id")
);
insert into publisher values(1,"John Wiley & Sons","United States",1807,"Academic","[['book_id'=>1, 'name'=>'Operating System Concepts'],['book_id'=>2, 'name'=>'Database System Concepts']]");
insert into publisher values(2,"Pearson Education","United Kingdom",1844,"Education","[['book_id'=>3, 'name'=>'Computer Networks'],['book_id'=>4, 'name'=>'Modern Operating Systems']]");
  [
    ['id'=>1,  'publisher'=>'John Wiley & Sons', 'country'=>'United States', 'founded'=>1807, 'genre'=>'Academic','books'=>[['book_id'=>1, 'name'=>'Operating System Concepts'],['book_id'=>2, 'name'=>'Database System Concepts']]],
    ['id'=>2,  'publisher'=>'Pearson Education', 'country'=>'United Kingdom', 'founded'=>1844, 'genre'=>'Education', 'books'=>[['book_id'=>3, 'name'=>'Computer Networks'],['book_id'=>4, 'name'=>'Modern Operating Systems']]]
  ]