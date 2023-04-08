CREATE TABLE "author" (
    "author_id"     INTEGER,
    "author_name"   TEXT,
    "author_nationality"   TEXT,
    "author_birth_year"   INTEGER,
    "author_fields" TEXT,
    PRIMARY KEY("author_id")
);

insert into author values(1,"Abraham Silberschatz","Israelis / American",1952,"Database Systems, Operating Systems");
insert into author values(2,"Andrew S. Tanenbaum","Dutch / American",1944,"Distributed computing, Operating Systems");

CREATE TABLE "book" (
    "book_id"     INTEGER,
    "book_title"   TEXT,
    "book_edition" TEXT,
    "book_copyright" INTEGER,
    "book_language" TEXT,
    "book_pages" INTEGER,
    "book_author" TEXT,
    "book_author_id" INTEGER,
    "book_publisher" TEXT,
    "book_publisher_id" INTEGER,
    PRIMARY KEY("book_id"),
    FOREIGN KEY("book_author_id") REFERENCES author("author_id"),
    FOREIGN KEY("book_publisher_id") REFERENCES publisher("publisher_id")
);

insert into book values(1,"Operating System Concepts","9th",2012,"ENGLISH",976,"Abraham Silberschatz",1,"John Wiley & Sons",1);
insert into book values(2,"Database System Concepts","6th",2010,"ENGLISH",1376,"Abraham Silberschatz",1,"John Wiley & Sons",1);
insert into book values(3,"Computer Networks","5th",2010,"ENGLISH",960,"Andrew S. Tanenbaum",2,"Pearson Education",2);
insert into book values(4,"Modern Operating Systems","4th",2014,"ENGLISH",1136,"Andrew S. Tanenbaum",2,"Pearson Education",2);

CREATE TABLE "publisher" (
    "publisher_id"     INTEGER,
    "publisher_name"   TEXT,
    "publisher_country"   TEXT,
    "publisher_founded"     INTEGER,
    "publisher_genre"  TEXT,
    PRIMARY KEY("publisher_id")
);

insert into publisher values(1,"John Wiley & Sons","United States",1807,"Academic");
insert into publisher values(2,"Pearson Education","United Kingdom",1844,"Education");


CREATE TABLE "book_by_pub_auth" (
    "book_id" INTEGER,
    "author_id" INTEGER,
    "publisher_id" INTEGER,
    FOREIGN KEY("book_id") REFERENCES book("book_id"),
    FOREIGN KEY("author_id") REFERENCES author("author_id"),
    FOREIGN KEY("publisher_id") REFERENCES publisher("publisher_id"),
    UNIQUE("book_id","author_id","publisher_id")
);

insert into book_by_pub_auth values(1,1,1);
insert into book_by_pub_auth values(2,1,1);
insert into book_by_pub_auth values(3,2,2);
insert into book_by_pub_auth values(4,2,2);

/*++++++++++++++++++++QUERIES++++++++++++++++++++*/
select b.title from book_by_pub_auth as bpa inner join book as b on b.id=bpa.book_id where bpa.publisher_id =1;
select b.title from book_by_pub_auth as bpa inner join book as b on b.id=bpa.book_id where bpa.author_id =1;