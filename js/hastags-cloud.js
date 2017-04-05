

//On a besoin de formatter la liste de tag comme suit :
//var list =[['foo', 12], ['bar', 6]];

// Du coup notre objet json :
//var o = { "_id" : "blabla", "count" : 2 }, { "_id" : "blabladd", "count":10};
// va devoir être reformatter.

// Utiliser le code jquery suivant :

var o = [{ "_id" : "blabla", "count" : 50 },{ "_id" : "blaefbla", "count" : 20 }];

list = [];
hashtags.forEach(function(element){
    console.log(element._id);
    if(element._id.text.includes("paris") == false || element._id.text.includes("Paris") == false){
        list.push($.map(element, function(el) {
            return [el.text, element.count];
        }));
    };
});
WordCloud(document.getElementById('tagCloud'), { list: list } );