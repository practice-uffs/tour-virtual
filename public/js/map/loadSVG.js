export  class LoadSVG{
  constructor(img_name,els, setActions, parent_name="#viewport"){
    parent = Snap(parent_name);
    Snap.load(img_name, onSVGLoaded);
    function onSVGLoaded(data) {
          parent.append( data );
          for( let e in els){
              try {
                  setActions(parent, els[e].component, els[e].group, els[e].title, els[e].description, els[e].list_description, els[e].identifier_360, els[e].cover_image);
              }catch (ex){
                  continue
              }

          }
    }
  }
}

