/**
 * Created by guidolippi on 17/06/2017.
 */



function convertCategoriesFromUserLikes(Jarray) {

    console.log("-------" + Jarray.paging.previous + "---------");

        for (i = 0; i < Jarray.data.length; i++) {
            var likeCategory = Jarray.data[i].category.toLowerCase();
            selectCategory(likeCategory);
            //console.log(likeCategory);
        }

        if(Jarray.paging.next != undefined) {
            var nextLikesPage = Jarray.paging.next;
            getJSON(nextLikesPage).then(function (data) {
                console.log(data);
                convertCategoriesFromUserLikes(data)
            });
        }
    categories = [music, sport, food, travel, fashion, education, entertainment, healtcare];
}


function selectCategory(realFBCategory){
    if(realFBCategory.includes("music") || realFBCategory.includes("disco")){
        music++;
    }
    else if (realFBCategory.includes("sport")){
        sport++;
    }
    else if(realFBCategory.includes("food") || realFBCategory.includes("restaurant") || realFBCategory.includes("bar") || realFBCategory.includes("pub") || realFBCategory.includes("wine") || realFBCategory.includes("beer") || realFBCategory.includes("pizza")){
        food++;
    }
    else if(realFBCategory.includes("healtt") || realFBCategory.includes("wellness") || realFBCategory.includes("gym")){
        healtcare++;
    }
    else if(realFBCategory.includes("travel") || realFBCategory.includes("trip") || realFBCategory.includes("flight") || realFBCategory.includes("train") || realFBCategory.includes("adventure")){
        travel++;
    }
    else if(realFBCategory.includes("fashion") || realFBCategory.includes("cloth")){
        fashion++;
    }
    else if(realFBCategory.includes("school") || realFBCategory.includes("course") || realFBCategory.includes("science")){
        education++;
    }
    else if(realFBCategory.includes("fun") || realFBCategory.includes("community") || realFBCategory.includes("public")){
        entertainment++;
    }
}

