<?php

return $dishes = [
  [
    "name" => "vegetable samosa", //char
    "description" => "involtino con ripieno di patate e verdure speziate", //string
    "price" => 1.50,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 25, //smallinteger
  ],
  [
    "name" => "vegetarian curry", //char
    "description" => "verdure miste cotte in una miscela speciale con curry", //string
    "price" => 5.90,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 25, //smallinteger
  ],
  [
    "name" => "vegetable biryani", //char
    "description" => "fragrante di riso basmati cotto con verdure miste", //string
    "price" => 7.00,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 25, //smallinteger
  ],
  [
    "name" => "riso bianco", //char
    "description" => "riso basmati cotto al vapore", //string
    "price" => 6.50,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 25, //smallinteger
  ],
  [
    "name" => "menu fisso", //char
    "description" => "samosa, pakora, seekh kebab, chicken tikka, chicken curry, riso bianco, pane naan e dlce gulab jamun", //string
    "price" => 15.00,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 26, //smallinteger
  ],
  [
    "name" => "menu fisso vegetariano", //char
    "description" => "samosa, pakora, palak pakora, baingan bharta, pane naan e dolce indiano", //string
    "price" => 11.50,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 26, //smallinteger
  ],
  [
    "name" => "samosa", //char
    "description" => "fagottino ripieno di verdure cotte", //string
    "price" => 1.70,//number
    "image" => "https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,q_auto,h_100,w_134,dpr_1.0/v1/it/dishes/201104/samosa.jpg",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 26, //smallinteger
  ],
  [
    "name" => "seekh kebabs pollo", //char
    "description" => "involtini carne macinata di pollo spezie e cotti nel forno tandoori", //string
    "price" => 7.70,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 26, //smallinteger
  ],
  [
    "name" => "menu seciale", //char
    "description" => "antipasto speciale, pollo o agnello o gamberoni tikka masala, riso verdure e cheese nan", //string
    "price" => 15.00,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 27, //smallinteger
  ],
  [
    "name" => "antipasto speciale", //char
    "description" => "per una persona", //string
    "price" => 6.95,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 27, //smallinteger
  ],
  [
    "name" => "insalata mista", //char
    "description" => "", //string
    "price" => 3.00,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 27, //smallinteger
  ],
  [
    "name" => "raj mix tandoori", //char
    "description" => "squisito assortimento di specialità tandoori", //string
    "price" => 14.95,//number
    "image" => "https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,q_auto,h_100,w_134,dpr_1.0/v1/it/dishes/201562/raj-mix-tandoori.jpg",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 27, //smallinteger
  ],
  [
    "name" => "componi il tuo menu pollo", //char
    "description" => "un antipasto, un piatto principale, un riso, un pane e una bibita", //string
    "price" => 14.95,//number
    "image" => "",//link
    "visibility" => 1,// 0-1
    "restaurant_id" => 28, //smallinteger
  ],
  [
    "name" => "antipasto speciale", //char
    "description" => "misto con chicken tikka, gamberoni butterfly, veg pakora e samosa vegetables", //string
    "price" => 5.95,//number
    "image" => "",//link
    "visibility" => ,// 0-1
    "restaurant_id" => , //smallinteger
  ],

  "visibility" => 1,// 0-1
  "restaurant_id" => 28, //smallinteger
],
[
  "name" => "raj special biriany", //char
  "description" => "agnello, pollo e gamberoni saltati con fragrante di riso basmati e con spezie indiane delicate, servite ocn salsa di verdure o salsa raitha a parte", //string
  "price" => 12.00,//number
  "image" => "",//link
  "visibility" => 1,// 0-1
  "restaurant_id" => 28, //smallinteger
],
[
  "name" => "misto tandoore special", //char
  "description" => "assortimento di bocconicni di petto di pollo, coscia di pollo, agnello kebab e gambaroni argentini cotti al forno tandoor", //string
  "price" => 12.00,//number
  "image" => "",//link
  "visibility" => 1,// 0-1
  "restaurant_id" => 28, //smallinteger
],

   //Mexican and FastFood dishes
   //Piatti per Messiacano(id.9 - id.12);
   //messicano1 id-9:
    [
      "restaurant_id" => 9,
      "name" => "Tamales",
      "description" => "Impasto di mais cotto a vapore all’interno di foglie di banana, carne manzo e verdure",
      "price" => 9.00 ,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/jnwlqyid66np06bhe58w",
      "visibility" => "true", // bool
    ],

    [
      "restaurant_id" => 9,
      "name" => "Burrito cali",
      "description" => "Tortilla di frumento arrotolata con ripieno di riso, spalla di maiale, bacon, fagioli neri e crema di edamer",
      "price" => 8.40 ,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/t5wsocnlookkuqmntbr2",
      "visibility" => "true",
    ],
    [
      "restaurant_id" => 9 ,  //smallinteger
      "name" => "Nachos", //char
      "description" => "110gr di nachos di mais conditi con chili con carne, jalapenos, panna acida e crema di cheddar",
      "price" => , 9.90, //number
      "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,f_auto,q_auto/Products/rf6uz6f9vgn88sdwglu4",
      "visibility" => "1",
    ],
    [
      "restaurant_id" => 9,  //smallinteger
      "name" => "Enchiladas", //char
      "description" => "Due tortillas di mais farcite con verdure e carne di pollo, ricoperte di salsa roja e formaggio, cotte al forno e servite con riso mex (piccante) e fagioli neri",   //string
      "price" => 12.50,   //number
      "image" => "https://res.cloudinary.com/glovoapp/w_100,f_auto,q_auto/Products/zkz6fypxwjqgwez8umqf",   //link
      "visibility" => 1,// bool
    ]

    //messicano2 id-10:
     [
       "restaurant_id" => 10,
       "name" => "Tamales",
       "description" => "Impasto di mais cotto a vapore all’interno di foglie di banana, carne manzo e verdure",
       "price" => 9.60 ,
       "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/jnwlqyid66np06bhe58w",
       "visibility" => "true", // bool
     ],

     [
       "restaurant_id" => 10,
       "name" => "Burrito cali",
       "description" => "Tortilla di frumento arrotolata con ripieno di riso, spalla di maiale, bacon, fagioli neri e crema di edamer",
       "price" => 9.40 ,
       "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/t5wsocnlookkuqmntbr2",
       "visibility" => "true",
     ],
     [
       "restaurant_id" => 10 ,  //smallinteger
       "name" => "Nachos", //char
       "description" => "110gr di nachos di mais conditi con chili con carne, jalapenos, panna acida e crema di cheddar",
       "price" => , 8.90, //number
       "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,f_auto,q_auto/Products/rf6uz6f9vgn88sdwglu4",
       "visibility" => "true",
     ],
     [
       "restaurant_id" => 10,  //smallinteger
       "name" => "Enchiladas", //char
       "description" => "Due tortillas di mais farcite con verdure e carne di pollo, ricoperte di salsa roja e formaggio, cotte al forno e servite con riso mex (piccante) e fagioli neri",   //string
       "price" => 11.50,   //number
       "image" => "https://res.cloudinary.com/glovoapp/w_100,f_auto,q_auto/Products/zkz6fypxwjqgwez8umqf",   //link
       "visibility" => "true",// bool
     ]

     //messicano3 id-11:
      [
        "restaurant_id" => 11,
        "name" => "Tamales",
        "description" => "Impasto di mais cotto a vapore all’interno di foglie di banana, carne manzo e verdure",
        "price" => 10.60 ,
        "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/jnwlqyid66np06bhe58w",
        "visibility" => "true", // bool
      ],

      [
        "restaurant_id" => 11,
        "name" => "Burrito cali",
        "description" => "Tortilla di frumento arrotolata con ripieno di riso, spalla di maiale, bacon, fagioli neri e crema di edamer",
        "price" => 10.40 ,
        "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/t5wsocnlookkuqmntbr2",
        "visibility" => "true",
      ],
      [
        "restaurant_id" => 11 ,  //smallinteger
        "name" => "Nachos", //char
        "description" => "110gr di nachos di mais conditi con chili con carne, jalapenos, panna acida e crema di cheddar",
        "price" => , 10.90, //number
        "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,f_auto,q_auto/Products/rf6uz6f9vgn88sdwglu4",
        "visibility" => "true",
      ],
      [
        "restaurant_id" => 11,  //smallinteger
        "name" => "Enchiladas", //char
        "description" => "Due tortillas di mais farcite con verdure e carne di pollo, ricoperte di salsa roja e formaggio, cotte al forno e servite con riso mex (piccante) e fagioli neri",   //string
        "price" =>  12.50,   //number
        "image" => "https://res.cloudinary.com/glovoapp/w_100,f_auto,q_auto/Products/zkz6fypxwjqgwez8umqf",   //link
        "visibility" => "true",// bool
      ]

      //messicano4 id-12:
       [
         "restaurant_id" => 12,
         "name" => "Tamales",
         "description" => "Impasto di mais cotto a vapore all’interno di foglie di banana, carne manzo e verdure",
         "price" => 10.60 ,
         "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/jnwlqyid66np06bhe58w",
         "visibility" => "true", // bool
       ],

       [
         "restaurant_id" => 12,
         "name" => "Burrito cali",
         "description" => "Tortilla di frumento arrotolata con ripieno di riso, spalla di maiale, bacon, fagioli neri e crema di edamer",
         "price" => 10.40 ,
         "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fill,f_auto,q_auto/Stores/t5wsocnlookkuqmntbr2",
         "visibility" => "true",
       ],
       [
         "restaurant_id" => 12 ,  //smallinteger
         "name" => "Nachos", //char
         "description" => "110gr di nachos di mais conditi con chili con carne, jalapenos, panna acida e crema di cheddar",
         "price" => , 9.90, //number
         "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,f_auto,q_auto/Products/rf6uz6f9vgn88sdwglu4",
         "visibility" => "true",
       ],
       [
         "restaurant_id" => 12,  //smallinteger
         "name" => "Enchiladas", //char
         "description" => "Due tortillas di mais farcite con verdure e carne di pollo, ricoperte di salsa roja e formaggio, cotte al forno e servite con riso mex (piccante) e fagioli neri",   //string
         "price" => 12.50,   //number
         "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100f_auto,q_auto/Products/zkz6fypxwjqgwez8umqf",   //link
         "visibility" => "true",// bool
       ],

       //Piatti per FASTFOOD(id.21 - id.24);

      //FASTFOOD id-21:
      [
      "restaurant_id" => 21,
      "name" => "La Belpaese",
      "description" => "Bresaola, Rucola, Grana",
      "price" => 6.50,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,h_100,c_fit,f_auto,q_auto/Products/bm1vnxxzkeqjz3xwsldo",
      "visibility" => "true",
  ],
  [
      "restaurant_id" => 21,
      "name" => "Whopper",
      "description" => "Classico irresistibile. La ricetta del leggendario Whopper®: carne di manzo alla griglia e ingredienti freschi per un sapore ineguagliabile.",
      "price" => 5.60,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/ewuyc9piur8e79i7pntg",
      "visibility" => "true",
      ],
      [

      "restaurant_id" => 21,
      "name" => "Plant Based Whopper",
      "description" => "L’iconico Whopper con una nuova patty a base vegetale, per un gusto 100% Whopper, 0% carne.",
      "price" => 5.90,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/tunyfp2h3h9xcwvnal8e",
      "visibility" => "true",
  ],
    [
      "restaurant_id" => 21,
      "name" => "Crispy chicken",
      "description" => "L’iconico Whopper con una nuova patty a base vegetale, per un gusto 100% Whopper, 0% carne.",
      "price" => 4.50,
      "image" => "https://res.cloudinary.com/glovoapp/w_600,h_500,c_fit,f_auto,q_auto/Products/bqt9nsz4nt3gduqzqx9i",
      "visibility" => "true",
  ],

      //FASTFOOD id-22:
      [
      "restaurant_id" => 22,
      "name" => "Wrap di Pollo Grigliato",
      "description" => "Piadina con ripieno di pollo grigliato, maionese, lattuga fresca e pomodoro",
      "price" => 5.40,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/rxu2olyi1thdbl4qommx",
      "visibility" => "true",
      ],
      [

      "restaurant_id" => 22,
      "name" => "Crispy chicken",
      "description" => "Semplicità color oro. Filetto di pollo in croccante panatura speziata. Pomodoro, lattuga e maionese.",
      "price" => 4.50,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/bqt9nsz4nt3gduqzqx9i",
      "visibility" => "true",
     ],
     [
      "restaurant_id" => 22,
      "name" => "Double cheeseburger",
      "description" => "Golosità compatta. Compatto, semplice ma unico. Per la merenda o un pranzo più light, gusto assicurato!",
      "price" => 3.90,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/msavqzewlukkowcpsl4z",
      "visibility" => "true",
      ],
      [

      "restaurant_id" => 22,
      "name" => "Big King",
      "description" => "Non mi basta.Il nostro Big King con doppia carne di manzo alla griglia, doppio formaggio e deliziosa salsa King.",
      "price" => 5.20,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/nuqxnasiho77s5g7oid3",
      "visibility" => "true",

  ],
    [
      //FASTFOOD id-23:
      "restaurant_id" => 23,
      "name" => "Friends Fries",
      "description" => "Croccanti e deliziose, non potrai farne a meno!",
      "price" => 3.40,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/x9itasgg8fhharuom2ts",
      "visibility" => "true",
  ],
  [
      "restaurant_id" => 23,
      "name" => "Chicken royale",
      "description" => "Croccante leggerezza. Usiamo solo il nostro panino al sesamo extralungo, con tanto petto di pollo dorato.",
      "price" => 5.20,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/sichqzffa7kzl8onmmaz",
      "visibility" => "true",
  ],
  [

      "restaurant_id" => 23,
      "name" => "Wrap di Pollo Grigliato",
      "description" => "Piadina con ripieno di pollo grigliato, maionese, lattuga fresca e pomodoro",
      "price" => 5.40,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/rxu2olyi1thdbl4qommx",
      "visibility" => "true",
      ],
      [

      "restaurant_id" => 23,
      "name" => "Plant Based Whopper",
      "description" => "L’iconico Whopper con una nuova patty a base vegetale, per un gusto 100% Whopper, 0% carne.",
      "price" => 5.90,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/tunyfp2h3h9xcwvnal8e",
      "visibility" => "true",
      ],


      //FASTFOOD id-24:
      [
      "restaurant_id" => 24,
      "name" => "Zinger",
      "description" => "Only the brave! Delizioso filetto di pollo con panatura Hot & Spicy, lattuga, cheddar cheese e doppio strato di maionese, in un morbido panino al sesamo. Gusto estremo!",
      "price" => 5.25,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/2047636477",
      "visibility" => "true",
      ],
      [

      "restaurant_id" => 24,
      "name" => "Double Krunch",
      "description" => "La morbida croccantezza raddoppia con 2 Tenders Crispy! Pane con semi di sesamo, due Tenders Crispy, insalata, cheddar e salsa al pepe nero.",
      "price" => 5.25,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/2047636475",
      "visibility" => "true",
      ],
      [

      "restaurant_id" => 24,
      "name" => "Colonel's Burger",
      "description" => "Il burger del Colonnello. Bacon, formaggio, insalata, salsa barbecue, maionese e un irresistibile filetto Original Recipe, preparato secondo la sua leggendaria ricetta, con il mix segreto di 11 erbe e spezie.",
      "price" => 5.70,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/2047636479",
      "visibility" => "true",
      ],
      [

      "restaurant_id" => 24,
      "name" => "Double cheeseburger",
      "description" => "Golosità compatta. Compatto, semplice ma unico. Per la merenda o un pranzo più light, gusto assicurato!",
      "price" => 3.90,
      "image" => "https://res.cloudinary.com/glovoapp/w_100,c_fit,f_auto,q_auto/Products/msavqzewlukkowcpsl4z",
      "visibility" => "true",
      ],







]
?>
