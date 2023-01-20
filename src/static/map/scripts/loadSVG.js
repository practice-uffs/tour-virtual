export  class LoadSVG{
  constructor(img_name,els, setActions, parent_name="#viewport"){
    parent = Snap(parent_name);
    Snap.load(img_name, onSVGLoaded);
    function onSVGLoaded(data) {
          parent.append( data );
          for( let e in els){
            setActions(parent, els[e].id, els[e].group, els[e].titulo, els[e].descricao, els[e].list_description, els[e].id_360);               
          }                
    }
  }  
}

