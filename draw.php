
  <div class="svg-container"></div>

    <div class="tets col-sm-4" id="parent">
        parenttt
    </div>
    <div class="tets col-sm-4" style="margin-top:60px;">
        hiiii
    </div>
    <div class="tets child col-sm-4" style="margin-top:60px;">
        hiiii
    </div>

</div>
<style>
  body {
  position: relative;
}

.svg-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
 
  
</style>
<!-- Connect your elements like in this example -->
<script>
  jQuery(document).ready(function() {
    let options={
      color:'green',
      inner_texts:[
        {innerHTML:'hello world'}
      ]
    }
    connect($('#parent'),$('.child'),options);

  });
  


  function connect(from_elem,to_elem,options){
     
    let x1= from_elem.position().left+from_elem.outerWidth(true);
    let x2= to_elem.position().left+to_elem.outerWidth(true);
    let y1=from_elem.position().top+(from_elem.outerHeight(true)-(from_elem.innerHeight()/2));
    let y2=to_elem.position().top+(to_elem.outerHeight(true)-(to_elem.innerHeight()/2));
    
    let html=`<svg height="100%" width="100%">
    <line x1="${x1-10}" y1="${y1}" x2="${x1+10}" y2="${y1}" style="stroke:${options.color || 'rgb(255,0,0)'};stroke-width:2" />
      <line x1="${x1+10}" y1="${y1}" x2="${x2+10}" y2="${y2}" style="stroke:${options.color || 'rgb(255,0,0)'};stroke-width:2" />
      <line x1="${x2-10}" y1="${y2}" x2="${x2+10}" y2="${y2}" style="stroke:${options.color || 'rgb(255,0,0)'};stroke-width:2" marker-end="url(#arrow_left)"/>
      <defs>
      <marker id="arrow_left" markerWidth="10" markerHeight="7" 
    refX="15" refY="3.5" orient="auto">
    <marker id='arrow_right' orient='auto' markerWidth='2' markerHeight='4'
            refX='0.1' refY='2'>
      <path d='M0,0 V4 L2,2 Z' fill='red' />
    </marker>
      <polygon points="12 0, 10 7, 0 4" fill="${options.color || 'rgb(255,0,0)'}" />
    </marker>
  </defs>   
      Sorry, your browser does not support inline SVG.
    </svg>`;
  
          $('.svg-container').html(html);
          if(options?.inner_texts){
            let svg=$('.svg-container').find("svg")[0];
            let default_text_y=20;
            for(let text_key in options.inner_texts){
              let text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
              text.setAttribute('x', x1+15);
              text.setAttribute('y', y1+default_text_y);
              text.setAttribute('width', options.inner_texts[text_key].width || 100);
              text.style.fill = options.inner_texts[text_key].fill || 'red';
              text.style.fontFamily = options.inner_texts[text_key].fontFamily || 'Verdana';
              text.style.fontSize = options.inner_texts[text_key].fontSize || '12';
              text.innerHTML = options.inner_texts[text_key].innerHTML || '';
              svg.appendChild(text);
              default_text_y+=20;
            }
          }
          
          
  }
  
</script>

