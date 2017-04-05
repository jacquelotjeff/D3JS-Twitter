//On a besoin de formatter la liste de tag comme suit :
//var list =[['foo', 12], ['bar', 6]];

// Du coup notre objet json :
//var o = { "_id" : "blabla", "count" : 2 }, { "_id" : "blabladd", "count":10};
// va devoir être reformatter.

// Utiliser le code jquery suivant :

var o = [{ "_id" : "blabla", "count" : 50 },{ "_id" : "blaefbla", "count" : 20 }];

list = [];
o.forEach(function(element){
    list.push($.map(element, function(el) { return el; }));
});
console.log(list);



WordCloud(document.getElementById('tagCloud'), { list: list } );