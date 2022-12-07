export  class LoadSVG{
  constructor(img_name,elementos, setActions, parent_name="#viewport"){
    parent = Snap(parent_name);
    Snap.load(img_name, onSVGLoaded);
    function onSVGLoaded(data) {
          parent.append( data );
          for( let elemento in elementos){
            setActions(parent, elementos[elemento].id, elementos[elemento].group, elementos[elemento].titulo, elementos[elemento].descricao, elementos[elemento].list_description);               
          }                
    }
  }  
}

