/*
This function is responsible for sending boolean 
result true if the case is valid for schema and relevant object
otherwise false if it fails. It uses AJV library from github to 
validate json according to provided schema.
*/
function validateMyData(schema,object){
        ajvVar = new Ajv();
          if(ajvVar.validate(schema,object))
           return true;
          else
             return false;    
}

/*
This function is responsible to output string 
string result will be a code that contains 
table and headings, it will generate the table only if its 
parameter is true otherwise failure message will be returned.
*/
function dynamicProgram(check){  
    var temp="";
    if(check){

        temp+='<h1>BBC Good Foods </h1>';
        temp+='<p>This is the BBC Food table and the schema macthes the required json format</p>'
        temp+='<table class="table-style">';
         temp+='<thead>';
         temp+='<tr>';
         temp+='<th>ID</th><th>Name of Recipe</th><th>Author</th><th>Ingredients</th><th>Preparation</th><th>Cooking</th><th>Steps</th><th>Nutrition Information</th';
         temp+='</tr>';
         temp+='</thead>';
        
           var x = recipeJsonObj;
        
        for(var i = 0; i<x.length;i++){
            
            temp+='<tr>';
            temp+='<td>'+x[i].id+'</td>';
            temp+='<td>'+x[i].title+'</td>';
            temp+='<td>'+x[i].author+'</td>';
            temp+='<td>'+x[i].ingredients+'</td>';
            temp+='<td>'+x[i].preparation+'</td>';
            temp+='<td>'+x[i].cooking+'</td>';
            temp+='<td>'+x[i].recipe+'</td>';
            temp+='<td>';
            temp+='<table class="table-style">';
            temp+='<thead><tr><td>kcal</td><td>fats</td><td>saturates</td><td>carbs</td><td>sugars</td><td>fibers</td><td>proteins</td><td>salts</td></thead><tbody><tr>';
            temp+='<td>'+x[i].kcal+'</td>';
            temp+='<td>'+x[i].fat+'</td>';
            temp+='<td>'+x[i].saturates+'</td>';
            temp+='<td>'+x[i].carbs+'</td>';
            temp+='<td>'+x[i].sugars+'</td>';
            temp+='<td>'+x[i].fibers+'</td>';
            temp+='<td>'+x[i].protein+'</td>';
            temp+='<td>'+x[i].salt+'</td>';
            temp+='</tr></tbody></table>';
            temp+='</td>';
            temp+='</tr>';
            
        }
        
        temp+='</table>';
        
    } else {
        temp+="<p>Either your schema is invalid according to format or your json file is invalid</p>"
    }
    return temp;
}


var recipeJsonObj; //JSON Object Holder 
var recipeJsonObjSchema; //JSON Schema Object Holder

/*
JQuery Code to read data from files 
and assign the data of read files to 
above variables.
*/
$.ajax({
  url: 'recipe.json',
  async: false,
  dataType: 'json',
  success: function (data) {
  recipeJsonObj = data;
      $.ajax({
  url: 'recipeSchema.json',
  async: false,
  dataType: 'json',
  success: function (data) {
    recipeJsonObjSchema = data;
  }
});}});

/*
Changing contents of the div with id called 'logical' <defined in HTML page> 
calling function to validate the data and then dynamicProgram Function takes 
boolean returned from function to make the div accordingly.
*/
document.getElementById("logical").innerHTML+=dynamicProgram(validateMyData(recipeJsonObjSchema,recipeJsonObj));