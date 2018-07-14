<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180214180949 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('
       
        CREATE TABLE main.cities(
          "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
          "name" VARCHAR(45) NOT NULL,
          "country_name" VARCHAR(45) NOT NULL
        );
        ');
        $this->addSql('
         INSERT INTO main.cities(`name`,`country_name`) 
          VALUES 
            ("London","England"),
            ("Manchester","England"),
            ("Kesington","England"),
            ("Watford","England"),
            ("Porto","Portugal"),
            ("Lisboa","Portugal"),
            ("Faro","Portugal"),
            ("Braga","Portugal"),
            ("Guarda","Portugal")
        ;        
        ');
        $this->addSql('
        CREATE TABLE main.hostels(
           "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
          "name" VARCHAR(255) NOT NULL,
          "street" VARCHAR(255) NOT NULL,
          "active" INTEGER NOT NULL,
          "city_id" INTEGER NOT NULL,
          CONSTRAINT "id_UNIQUE"
            UNIQUE("id"),
          CONSTRAINT "fk_hostels_cities"
            FOREIGN KEY("city_id")
            REFERENCES "cities"("id")
        );
        ');
        $this->addSql('
        CREATE INDEX main."hostels.fk_hostels_cities_idx" ON "hostels" ("city_id");
        ');
        $this->addSql('
        INSERT INTO main.hostels(`name`,`street`,`active`,`city_id`) 
         VALUES ("Mi Lacinia Mattis Associates","4688 Consectetuer St.",0,6),
         ("Lobortis Quis Inc.","910-642 Vel, St.",1,7),
         ("Ligula Aenean Inc.","Ap #917-3552 Sem St.",1,8),
         ("Mi Pede Limited","Ap #313-2495 Velit. Rd.",1,8),
         ("Orci Foundation","268-9990 Sed, St.",0,4),
         ("Elit Nulla Facilisi Corporation","6656 Tellus Ave",1,2),
         ("Cras Eget PC","1250 Luctus St.",1,6),
         ("Sed Limited","Ap #964-3560 Vulputate Ave",0,1),
         ("Gravida Non Ltd","651-3030 Ut Rd.",1,4),
         ("Tincidunt Neque Limited","P.O. Box 565, 3547 Consectetuer Ave",1,7),
         ("Ut Eros Industries","Ap #761-1493 Sollicitudin Av.",1,3),
         ("Pede Consulting","771-6275 Ultricies Av.",0,6),
         ("Nullam Enim Corporation","761-9644 Orci Ave",0,1),
         ("Orci Associates","458-1450 Quisque Street",0,2),
         ("In Faucibus Associates","Ap #219-4621 Hendrerit St.",0,2),
         ("Magna LLP","865-2571 Vitae Avenue",1,3),
         ("Eu Corp.","626-4830 Luctus. Ave",0,1),
         ("Magna Nam Foundation","Ap #880-5273 A, St.",1,4),
         ("Interdum Enim Foundation","9679 Placerat Street",1,2),
         ("Mauris Vestibulum Neque Company","P.O. Box 944, 6832 Gravida. Rd.",1,7),
         ("Ac Fermentum Corp.","353-2230 Venenatis Rd.",1,3),
         ("Felis Donec Corporation","4450 Cras Rd.",0,8),
         ("Pede Malesuada LLC","4592 Proin St.",0,3),
         ("Parturient Montes Nascetur Industries","342-2419 Suscipit, Street",0,6),
         ("Facilisi Sed Neque Associates","622-2415 Nisl St.",0,3),
         ("Posuere Vulputate Associates","902-7380 Amet, Road",0,2),
         ("Blandit Nam Consulting","8962 Senectus Ave",0,6),
         ("Donec Tempor Corp.","9399 Congue. Rd.",0,6),
         ("Lorem Ipsum Sodales Industries","P.O. Box 383, 8880 Vivamus Road",1,7),
         ("Nibh Phasellus Nulla Incorporated","517-401 Egestas. St.",0,4),
         ("Nulla Cras PC","P.O. Box 484, 3188 Lobortis St.",0,6),
         ("Mi Industries","P.O. Box 200, 6349 Nec Avenue",0,2),
         ("Metus In LLP","P.O. Box 804, 9980 Nulla. St.",0,7),
         ("Sem Pellentesque Ut Industries","Ap #633-2587 Mus. Avenue",0,1),
         ("Blandit Mattis Cras Inc.","859-316 Pede Rd.",0,1),
         ("Cum Sociis Natoque PC","657-1130 Parturient Av.",1,7),
         ("Aliquam Gravida Mauris Corp.","P.O. Box 289, 509 Ante Street",1,7),
         ("Sapien LLC","2778 Non, Street",0,8),
         ("In Sodales Inc.","Ap #621-9051 Lorem Ave",0,2),
         ("Quisque Libero Lacus Industries","P.O. Box 234, 7794 Parturient Avenue",1,1),
         ("Dui Augue Eu LLC","P.O. Box 653, 9198 Nibh. Street",0,6),
         ("Lorem Vitae Consulting","2903 Sagittis. St.",1,2),
         ("Fringilla Institute","Ap #428-620 Nam Av.",1,2),
         ("Nunc Mauris Morbi Associates","Ap #447-5358 Congue, St.",0,3),
         ("Eu Nibh Vulputate Corp.","P.O. Box 270, 215 Lacinia Avenue",0,3),
         ("Nec Limited","P.O. Box 554, 5082 Mollis. Road",1,2),
         ("Tempus Scelerisque Corp.","P.O. Box 786, 3441 Placerat, Street",1,8),
         ("Eget Varius Inc.","P.O. Box 522, 2174 Cursus St.",1,7),
         ("Cras Associates","Ap #312-4988 Pretium Ave",0,6),
         ("Orci In Consequat LLP","Ap #669-4348 Erat, St.",1,2),
         ("Augue Porttitor LLC","6149 Vivamus Av.",0,2),
         ("Vitae LLP","P.O. Box 367, 7957 Senectus Av.",1,2),
         ("Tortor Ltd","P.O. Box 964, 9974 Nascetur Ave",1,2),
         ("Senectus Et Netus Associates","3007 Tristique Street",1,3),
         ("Nonummy Ultricies Ornare Corporation","P.O. Box 153, 1010 Donec St.",1,7),
         ("Magna Nam Ligula LLP","422-7934 Quisque Road",1,7),
         ("Donec LLP","Ap #226-9348 Dui. St.",0,8),
         ("Aenean Euismod Foundation","P.O. Box 800, 2208 Pulvinar Street",0,2),
         ("Ultricies Corporation","462-5965 Ipsum Street",1,7),
         ("Netus Et Malesuada Industries","4260 Nullam Ave",1,3),
         ("Pede Praesent Ltd","Ap #413-8602 Nascetur Street",0,6),
         ("Sed PC","Ap #805-616 Convallis, Road",0,3),
         ("Pede Cum Sociis Inc.","P.O. Box 863, 981 Vel Rd.",0,7),
         ("Pede Corp.","4374 A Road",1,2),
         ("Eleifend Vitae Associates","P.O. Box 693, 691 Mauris Rd.",0,2),
         ("Dictum Institute","Ap #440-3575 Et Av.",1,8),
         ("Vestibulum Ante Ipsum Foundation","146 Nullam Rd.",0,2),
         ("Etiam Bibendum Company","892-1189 Molestie Avenue",0,1),
         ("Libero LLC","738-4291 Justo Avenue",0,7),
         ("Sit Amet Consectetuer Corp.","4866 Luctus Av.",1,4),
         ("Eget Massa Consulting","5334 Elit, Road",0,8),
         ("Iaculis Company","Ap #605-9408 Vitae Road",1,6),
         ("Lorem Foundation","7694 Ornare, Rd.",0,1),
         ("Ut Nulla Incorporated","980-5905 Egestas Rd.",0,1),
         ("Sem Elit Industries","2050 Odio Ave",0,8),
         ("Ut Sagittis Lobortis Corp.","804-6291 Montes, Ave",1,1),
         ("Viverra Donec Tempus PC","885-3698 Lorem, Street",0,2),
         ("Penatibus Et Incorporated","432-9724 Curabitur Av.",0,2),
         ("Metus Inc.","871-1510 Nunc Av.",1,3),
         ("Metus Urna Convallis PC","P.O. Box 378, 5506 Enim Street",1,6),
         ("Magna Consulting","1541 Vulputate Rd.",0,1),
         ("Duis Risus Odio Limited","320 Fusce Street",1,7),
         ("Ac Limited","Ap #983-7229 Dolor. Road",0,7),
         ("Ornare Egestas Ligula Incorporated","Ap #287-4882 Est Avenue",0,4),
         ("Rutrum Industries","1997 Blandit Street",1,2),
         ("Auctor Velit Corporation","Ap #196-7270 Eu Ave",1,3),
         ("Fermentum Metus Corporation","5906 Fringilla, Av.",0,4),
         ("Nullam Suscipit Est Foundation","P.O. Box 553, 6660 Natoque Av.",0,8),
         ("Mattis Velit Justo Consulting","847-3209 Nulla St.",0,3),
         ("Nunc Sed LLP","582-3827 Quis, St.",1,1),
         ("Viverra Ltd","988-5508 Sem, Rd.",0,8),
         ("Libero Proin Sed LLC","Ap #355-8341 Mi Street",0,5),
         ("Quam A Felis LLC","P.O. Box 869, 7579 Vel Av.",0,8),
         ("Placerat Cras Dictum Incorporated","Ap #342-510 Laoreet Road",1,5),
         ("Non Industries","652-9796 Quisque St.",1,4),
         ("Praesent Interdum LLP","P.O. Box 592, 5505 Cras Rd.",0,5),
         ("Ullamcorper Eu Euismod Inc.","4148 Suspendisse Street",0,2),
         ("Eu Eros Nam Corp.","P.O. Box 568, 1484 Purus, Rd.",0,2),
         ("Bibendum Corp.","793-8926 Eros Rd.",0,7),
         ("Lorem Sit Amet Company","P.O. Box 686, 5626 Euismod Street",1,7);
');
        $this->addSql('
        
        CREATE TABLE main.reviews(
          "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
          "user_name" VARCHAR(45) NOT NULL,
          "rating" INTEGER NOT NULL,
          "content" MEDIUMTEXT,
          "hostel_id" INTEGER NOT NULL,
          CONSTRAINT "id_UNIQUE"
            UNIQUE("id"),
          CONSTRAINT "fk_reviews_hostels1"
            FOREIGN KEY("hostel_id")
            REFERENCES "hostels"("id")
        );
        
        ');
        $this->addSql('
        CREATE INDEX main."reviews.fk_reviews_hostels1_idx" ON "reviews" ("hostel_id");
        ');
        $this->addSql('
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Elmo",2,"dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras",9),("Tatyana",5,"et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales",10),("Danielle",5,"Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus",4),("Cameron",1,"Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin",10),("Laura",3,"dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa",4),("Yoshio",4,"elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus",9),("Jin",3,"scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam.",5),("Abra",2,"enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue",4),("Reed",1,"facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et,",2),("Sarah",2,"ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt",3);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Kieran",2,"tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et",9),("Callie",3,"vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac,",5),("Chancellor",3,"consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis",10),("Cally",5,"est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis",2),("Walker",2,"quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel,",4),("Alvin",1,"erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque.",5),("Thane",2,"mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat,",9),("Dante",5,"neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo",4),("Lester",2,"Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris",6),("Haviva",4,"vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis",6);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Joan",2,"at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla,",1),("Helen",2,"tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum",5),("Shad",5,"ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris",9),("Chantale",4,"neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec",3),("Justin",2,"Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus.",1),("Aladdin",1,"urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie",7),("Clarke",4,"sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula",6),("Kylan",5,"et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et",8),("Chadwick",5,"magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit",3),("Armand",3,"vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie",1);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Jeremy",5,"et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat",7),("Igor",1,"Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante",5),("Hashim",3,"vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient",10),("Jolie",1,"massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula.",7),("Herman",2,"nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus",6),("Garrison",4,"fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris",3),("Kelsey",3,"et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin",2),("Arden",3,"elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc.",9),("Baxter",5,"magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec",10),("Alexander",2,"non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam",10);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Donovan",2,"Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse",10),("Mohammad",2,"non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin",10),("Yuri",1,"purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla",4),("Bethany",1,"at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris",9),("Craig",1,"euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at",10),("Yuri",1,"mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant",4),("Kylynn",4,"fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris",3),("Frances",5,"volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et,",8),("Hiroko",4,"nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra,",3),("Joseph",4,"Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc",6);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Melyssa",1,"Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis,",6),("Jorden",2,"Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam,",4),("Rhoda",2,"lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam.",1),("Miranda",5,"id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna.",9),("Berk",4,"eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac",8),("Reagan",2,"scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam.",2),("Moana",2,"eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam",9),("Shea",5,"dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper,",4),("Melanie",1,"diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus",10),("Serina",1,"orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum.",7);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Xenos",3,"id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac",2),("Tanek",3,"non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae",8),("Alyssa",2,"ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi.",2),("Uma",4,"nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada.",6),("Kermit",1,"Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget",1),("Kane",1,"lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus.",8),("Angelica",5,"Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper,",8),("Uriah",2,"ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat,",6),("Abraham",1,"vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est,",8),("Alisa",1,"Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan",8);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("TaShya",1,"nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim",9),("Aquila",4,"mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem.",8),("Kelly",4,"Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales",5),("Keelie",4,"vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur",1),("Thor",4,"Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis",1),("Oscar",5,"tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede.",1),("Lee",1,"sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,",9),("Lance",1,"mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec",9),("Trevor",5,"risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris",7),("Cheyenne",3,"Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin",10);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Regina",1,"nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna",3),("Igor",5,"arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis",2),("Wayne",4,"tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi",3),("Graham",5,"nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate,",8),("Dalton",1,"cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus",3),("Melvin",2,"eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing",4),("Aretha",1,"mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat",10),("Ignatius",5,"vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh.",6),("Alyssa",1,"ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget",8),("Hamilton",4,"amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id,",10);
            INSERT INTO main.reviews(user_name,rating,content,hostel_id) VALUES ("Berk",4,"ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut",7),("Shelley",1,"ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis.",5),("Rogan",3,"ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet",9),("Tucker",5,"sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed",8),("Dexter",4,"felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum",6),("Stephen",2,"felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet,",8),("Logan",2,"pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis",1),("Byron",2,"elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum",1),("Moana",5,"Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec,",7),("Thane",3,"sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non",5);


        ');

    }

    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE main.cities');
        $this->addSql('DROP TABLE main.hostels');
        $this->addSql('DROP TABLE main.reviews');

    }
}
