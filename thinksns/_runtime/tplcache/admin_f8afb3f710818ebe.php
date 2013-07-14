<?php if (!defined('THINK_PATH')) exit();?><div id='stringText_<?php echo ($inputname); ?>' model-node='string_text' model-args='value=<?php echo ($value); ?>&inputname=<?php echo ($inputname); ?>'>
	<div class="tag-lists">
		<ul class="taglist"></ul>
	</div>
	<div >
	<input event-node="stringInput" type="text"  value=""/> 
	<input type="hidden" name='<?php echo ($inputname); ?>' event-node ='hiddenInput' value='<?php echo ($value); ?>'>	
	</div>
</div>

<script type="text/javascript">
(function(){
	M.addModelFns({
		string_text:{
			load:function(){
				var args = M.getModelArgs(this);
				var stringText = new core.stringDb(this,args.inputname,args.value);	
				stringText.init();	
				var stringInput = this.childEvents['stringInput'][0];
				$(stringInput).bind('keypress',function(e){
					var keycode = e.which||e.keyCode;  
					if(keycode == 13){
						stringText.add($.trim($(stringInput).val()));
						$(stringInput).val('');
						return false;
					}
					return true;
				});
			}
		}
	});
})();
</script>