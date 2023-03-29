
var svg = document.querySelector("#svg");
var  beforePan = function(oldPan, newPan){
    var stopHorizontal = false
        , stopVertical = false
        , gutterWidth = 100
        , gutterHeight = 50
        // Computed variables
        , sizes = this.getSizes()
        , leftLimit = -((sizes.viewBox.x + sizes.viewBox.width) * sizes.realZoom) + gutterWidth
        , rightLimit = sizes.width - gutterWidth - (sizes.viewBox.x * sizes.realZoom)
        , topLimit = -((sizes.viewBox.y + sizes.viewBox.height) * sizes.realZoom) + gutterHeight
        , bottomLimit = sizes.height - gutterHeight - (sizes.viewBox.y * sizes.realZoom)

    customPan = {}
    customPan.x = Math.max(leftLimit, Math.min(rightLimit, newPan.x))
    customPan.y = Math.max(topLimit, Math.min(bottomLimit, newPan.y))

    return customPan
}



var panZoom = svgPanZoom('#svg', {

    panEnabled: true
    , controlIconsEnabled: false
    , zoomEnabled: true
    , dblClickZoomEnabled: false
    , mouseWheelZoomEnabled: true
    , preventMouseEventsDefault: true
    , zoomScaleSensitivity: 0.4
    , minZoom: 1
    , maxZoom: 10

    , refreshRate: 240
    , beforePan: beforePan
    ,onPan: ()=>{
        Snap('#svg').select(".svg-pan-zoom_viewport").removeClass('smooth-zoom')

    }
    ,onZoom: ()=>{
        Snap('#svg').select(".svg-pan-zoom_viewport").addClass('smooth-zoom')
    }


});






$("#zoomreset").click(function(){
    panZoom.resetZoom()
    panZoom.fit();
    panZoom.center();
    panZoom.zoomBy(1.1)
});
$("#zoomin").click(()=>{
    panZoom.zoomBy(1.4)
})
$("#zoomout").click(()=>{
    panZoom.zoomBy(0.6)
})

panZoom.zoomBy(1.1)
