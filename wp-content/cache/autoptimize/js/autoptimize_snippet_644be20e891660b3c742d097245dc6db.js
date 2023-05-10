function init_thwvsf(){thwvsf_public.initialize_thwvsf()}var thwvsf_lazy_load=function(){"use strict";function initialize_thwvsf_lazy_load(){function showImagesOnView(e){var _iteratorNormalCompletion=!0,_didIteratorError=!1,_iteratorError=void 0;try{for(var _step,_iterator=images[Symbol.iterator]();!(_iteratorNormalCompletion=(_step=_iterator.next()).done);_iteratorNormalCompletion=!0){var i=_step.value;if(!i.getAttribute("src")){var bounding=i.getBoundingClientRect();bounding.top>=0&&bounding.left>=0&&bounding.bottom<=(window.innerHeight||document.documentElement.clientHeight)&&bounding.right<=(window.innerWidth||document.documentElement.clientWidth)&&(i.setAttribute("src",i.dataset.src),i.getAttribute("data-srcset")&&i.setAttribute("srcset",i.dataset.srcset))}}}catch(err){_didIteratorError=!0,_iteratorError=err}finally{try{!_iteratorNormalCompletion&&_iterator.return&&_iterator.return()}finally{if(_didIteratorError)throw _iteratorError}}}if("yes"===thwvsf_public_var.lazy_load){var images=document.querySelectorAll("img.swatch-image[data-src]");showImagesOnView(),window.addEventListener("scroll",showImagesOnView,!1)}}return{initialize_thwvsf_lazy_load:initialize_thwvsf_lazy_load}}(),thwvsf_public_base=function($,window,document){"use strict";function display_char_count(elm,isCount){var fid=elm.prop("id"),len=elm.val().length,displayElm=$("#"+fid+"-char-count");if(isCount)displayElm.text("("+len+" characters)");else{var maxLen=elm.prop("maxlength"),left=maxLen-len;displayElm.text("("+left+" characters left)"),rem<0&&displayElm.css("color","red")}}function set_field_value_by_elm(elm,type,value){switch(type){case"radio":elm.val([value]);break;case"checkbox":1==elm.data("multiple")?(value=value||[],elm.val([value])):elm.val([value]);break;case"select":elm.prop("multiple")?elm.val(value):elm.val([value]);break;case"country":case"state":elm.val([value]).change();break;case"multiselect":elm.prop("multiple")?void 0!==value&&elm.val(value.split(",")).change():elm.val([value]);break;default:elm.val(value)}}function get_field_value(type,elm,name){var value="";switch(type){case"radio":value=$("input[type=radio][name="+name+"]:checked").val();break;case"checkbox":if(1==elm.data("multiple")){var valueArr=[];$("input[type=checkbox][name='"+name+"[]']:checked").each(function(){valueArr.push($(this).val())}),value=valueArr}else value=$("input[type=checkbox][name="+name+"]:checked").val();break;case"select":case"multiselect":default:value=elm.val()}return value}return{display_char_count:display_char_count,set_field_value_by_elm:set_field_value_by_elm,get_field_value:get_field_value}}(window.jQuery,window,document),thwvsf_public=function($){"use strict";function initialize_thwvsf(){function active_and_deactive_variation(form){var $attributeFields=form.$attributeFields;form.$form.find(".woocommerce-variation-add-to-cart");$attributeFields.each(function(index,el){var current_attr_select=$(el),current_attr_name=current_attr_select.data("attribute_name")||current_attr_select.attr("name");if(current_attr_select.hasClass("wc-bundle"))var current_attr_name="attribute_"+current_attr_select.attr("id");form.$form.find('.thwvsf-checkbox[data-attribute_name= "'+current_attr_name+'"]').addClass("deactive"),current_attr_select.children("option").each(function(i,option){var opt_val=option.value;if(""!=opt_val){var $current_opt=form.$form.find("[data-value='"+opt_val+"']");if($current_opt.length>0)$current_opt.removeClass("deactive");else{var $current_opt=form.$form.find(".thwvsf-checkbox."+opt_val);$current_opt.removeClass("deactive")}}})})}function disable_out_of_stock_variation(form){var attributeFields=form.$attributeFields;if(1==attributeFields.length)for(var variations=form.variationData,i=0;i<variations.length;i++){var variation=variations[i],variation_attributes=variation.attributes,attribute_key=Object.keys(variation_attributes),attr_item_name=attribute_key[0],attr_item_name_class=attr_item_name,current_attr_select=$(attributeFields);$(attributeFields).hasClass("wc-bundle")&&(attr_item_name_class="attribute_"+current_attr_select.attr("id")),attr_item_name_class=attr_item_name_class.replace(/[^a-z0-9_-]/gi,"");var attribute_value=variation_attributes[attr_item_name],attribute_value_class=attribute_value.replace(/[^a-z0-9_-]/gi,""),is_in_stock=variation.is_in_stock,attr_option_class="";attribute_value_class?(attr_option_class="."+attr_item_name_class,attr_option_class=attr_option_class+"."+attribute_value_class):attr_option_class="."+attr_item_name_class+'[data-value="'+attribute_value+'"]',is_in_stock||"default"==out_of_stock?form.$form.find(attr_option_class).removeClass("out_of_stock"):(form.$form.find(attr_option_class).addClass("out_of_stock"),form.$form.find(attr_option_class).trigger("out_of_stock",[is_in_stock,attr_item_name]))}else disable_out_of_stock_variation_multiple(form,attributeFields)}function disable_out_of_stock_variation_multiple(form,attributeFields){var total_attributes=attributeFields.length,count=0,selected_terms=[],selected_term_names=[];attributeFields.each(function(index,element){var current_attr_select=$(this),current_attr_name=current_attr_select.data("attribute_name")||current_attr_select.attr("name"),selected_attribute_val=current_attr_select.val();""!=selected_attribute_val&&(count=++count,selected_terms[current_attr_name]=selected_attribute_val,selected_term_names[count]=current_attr_name)}),(0==count||count<total_attributes-1)&&form.$form.find(".thwvsf_fields .thwvsf-checkbox").removeClass("out_of_stock");var variations=form.variationData;if(count==total_attributes-1)for(var i=0;i<variations.length;i++){var variation=variations[i],variation_attributes=variation.attributes,q=0;$.each(variation_attributes,function(attr_item_name,attribute_value){if(variation_attributes[attr_item_name]==selected_terms[attr_item_name]&&++q==total_attributes-1){var current_variation=variation,current_attributes=current_variation.attributes;for(var current_attr_name in current_attributes)if(-1==jQuery.inArray(current_attr_name,selected_term_names)){var current_attr_val=variation_attributes[current_attr_name],attr_item_name_class=current_attr_name.replace(/[^a-z0-9_-]/gi,""),current_attr_select=$("select.cls_"+attr_item_name_class);current_attr_select.hasClass("wc-bundle")&&(attr_item_name_class="attribute_"+current_attr_select.attr("id")),attr_item_name_class=attr_item_name_class.replace(/[^a-z0-9_-]/gi,"");var attribute_value_class=current_attr_val.replace(/[^a-z0-9_-]/gi,""),attr_option_class="";attr_option_class=attribute_value_class?"."+attr_item_name_class+"."+attribute_value_class:"."+attr_item_name_class+'[data-value="'+current_attr_val+'"]';var is_in_stock=variation.is_in_stock;is_in_stock||"default"==out_of_stock?form.$form.find(attr_option_class).removeClass("out_of_stock"):(form.$form.find(attr_option_class).addClass("out_of_stock"),form.$form.find(attr_option_class).trigger("out_of_stock",[is_in_stock,attr_item_name]))}}})}else{form.$form.find(".thwvsf_fields .thwvsf-checkbox").removeClass("out_of_stock");for(var i=0;i<variations.length;i++){var variation=variations[i],variation_attributes=variation.attributes,is_in_stock=variation.is_in_stock;if(!is_in_stock&&"default"!=out_of_stock){var q=0,current_variation=variation,current_attributes=current_variation.attributes;$.each(current_attributes,function(os_attr_name,os_attr_value){selected_terms[os_attr_name]==os_attr_value&&++q==total_attributes-1&&$.each(current_attributes,function(de_attr_name,de_attr_value){if(selected_terms[de_attr_name]!=de_attr_value){var current_os_attr_val=current_attributes[de_attr_name],attr_item_name_class=de_attr_name.replace(/[^a-z0-9_-]/gi,""),attribute_value_class=current_os_attr_val.replace(/[^a-z0-9_-]/gi,""),current_attr_select=$("select.cls_"+attr_item_name_class);current_attr_select.hasClass("wc-bundle")&&(attr_item_name_class="attribute_"+current_attr_select.attr("id")),attr_item_name_class=attr_item_name_class.replace(/[^a-z0-9_-]/gi,"");var attr_option_class="";attr_option_class=attribute_value_class?"."+attr_item_name_class+"."+attribute_value_class:"."+attr_item_name_class+'[data-value="'+current_os_attr_val+'"]',form.$form.find(attr_option_class).addClass("out_of_stock"),form.$form.find(attr_option_class).trigger("out_of_stock",[is_in_stock,os_attr_name])}})})}}}}function show_selected_variation_name_beside_label(elm,variation_name,name_value){elm.closest("tr").find(".label").find("label").find(".variation_name_label").remove();var default_label=elm.closest("tr").find(".label").find("label"),variation_name_label_html='<label class="variation_name_label" > '+thwvsf_public_var.change_separator+variation_name+" </label>";variation_name_label_html=name_value?variation_name_label_html:"",default_label.append(variation_name_label_html)}function format_swatch_color(option){if(!option.id)return option.text;var color=$(option.element).data("swatch");return $('<span class = "thwvsf-drop-span thwvsf-drop-color" style="background-color:'+color+';"> </span><span class = "thwvsf-drop-label" >'+option.text+"</span>")}function format_swatch_image(option){if(!option.id)return option.text;var image=$(option.element).data("swatch");return $('<span class = "thwvsf-drop-span thwvsf-drop-img"><img src="'+image+'" /> </span><span class = "thwvsf-drop-label" >'+option.text+"</span>")}thwvsf_lazy_load.initialize_thwvsf_lazy_load();var clear_on_reselect=(thwvsf_public_var.enable_stock_alert,thwvsf_public_var.min_value_stock,thwvsf_public_var.clear_on_reselect),out_of_stock=thwvsf_public_var.out_of_stock,show_selected_variation_name=thwvsf_public_var.show_selected_variation_name,choose_option_text=thwvsf_public_var.choose_option_text,swatches_form=function($form){var self=this;self.$form=$form,this.variationData=$form.data("product_variations"),this.$attributeFields=$form.find(".variations select"),self.$singleVariation=$form.find(".single_variation"),self.$singleVariationWrap=$form.find(".single_variation_wrap"),$form.on("click.thwvsf_variation_form",".thwvsf-checkbox",{swatches_form:this},this.onselect),$form.on("change.thwvsf_variation_form",'input[type="radio"].thwvsf-rad',{swatches_form:this},this.onselectradio),$form.on("check_variations.thwvsf_variation_form",{swatches_form:this},this.onFindVariation),$form.on("click.thwvsf_variation_form",".reset_variations",{swatches_form:this},this.onReset),$form.on("change.thwvs_variation_form",".variations .thwvs-select",{swatches_form:this},this.onchangeselect),thwvsf_public_var.selectWoo_enable&&self.enableSwatchDropDown(self.$attributeFields,$form);var selc2_el=$(".thwvsf-wrapper-ul").prev();selc2_el.hasClass("select2")&&selc2_el.css("display","none");var selc2_rad_el=$(".thwvsf-rad-li").prev();selc2_rad_el.hasClass("select2")&&selc2_rad_el.css("display","none")};swatches_form.prototype.onReset=function(event){var form=event.data.swatches_form;form.$form.find(".thwvsf_fields .thwvsf-checkbox").removeClass("thwvsf-selected"),form.$form.find(".thwvsf_fields > span").removeClass("selected"),form.$form.find(".thwvsf_fields .thwvsf-checkbox").removeClass("deactive"),form.$form.find(".thwvsf_fields .thwvsf-checkbox").removeClass("out_of_stock"),form.$form.find(".thwvsf-rad").prop("checked",!1),form.$form.find(".thwvsf-rad").attr("checked",!1),form.$form.find(".thwvsf-rad-li > label").removeClass("thwvsf-selected");var $element=$(this);$element.parents(".variations_form").siblings(".thwvsf_add_to_cart_button");active_and_deactive_variation(form),disable_out_of_stock_variation(form)},swatches_form.prototype.onselect=function(event){var form=event.data.swatches_form,$element=$(this),$select=$element.closest(".thwvsf_fields").find("select"),attribute_name=$select.data("attribute_name")||$select.attr("name"),value=$element.data("value");selected.push(attribute_name);var opt_val=value;if(opt_val="string"==typeof opt_val?opt_val.replace(/'/g,"\\'").replace(/"/g,'\\"'):opt_val,!$select.find('option[value="'+opt_val+'"]').length)return $element.siblings(".thwvsf-checkbox").removeClass("thwvsf-selected"),$select.val("").change(),alert("No combination"),!1;if($element.hasClass("thwvsf-selected")){if("yes"!=clear_on_reselect)return!1;$select.val(""),$element.removeClass("thwvsf-selected")}else $element.addClass("thwvsf-selected").siblings(".thwvsf-selected").removeClass("thwvsf-selected"),$select.val(value);$select.change(),active_and_deactive_variation(form),disable_out_of_stock_variation(form)},swatches_form.prototype.onselectradio=function(event){var $element=(event.data.swatches_form,$(this)),$select=$element.closest(".thwvsf_fields").find("select"),attribute_name=$select.data("attribute_name")||$select.attr("name"),value=$element.data("value");clicked=attribute_name,selected.push(attribute_name);var parent_radio=$element.closest(".th-label-radio");1==$element.prop("checked")&&parent_radio.addClass("thwvsf-selected").siblings().removeClass("thwvsf-selected"),$select.val(value),$select.change()},swatches_form.prototype.onchangeselect=function(event,chosenAttributes){var $element=$(this);if("yes"===show_selected_variation_name){show_selected_variation_name_beside_label($element,$element.children(":selected").text(),$element.val())}},$.fn.wc_set_variation_attr=function(attr,value){void 0===this.attr("data-o_"+attr)&&this.attr("data-o_"+attr,this.attr(attr)?this.attr(attr):""),!1===value?this.removeAttr(attr):this.attr(attr,value)},swatches_form.prototype.onFindVariation=function(event){var form=event.data.swatches_form,$attributeFields=form.$attributeFields;active_and_deactive_variation(form),disable_out_of_stock_variation(form),"yes"===show_selected_variation_name&&$attributeFields.each(function(index,element){var current_attr_select=$(this);current_attr_select.data("attribute_name")||current_attr_select.attr("name");""!=current_attr_select.val()&&show_selected_variation_name_beside_label(current_attr_select,current_attr_select.children(":selected").text(),current_attr_select.val())})},swatches_form.prototype.enableSwatchDropDown=function($attributeFields,$form){$attributeFields.each(function(index,el){var attr_select=$(el);if(attr_select.hasClass("thwvsf-swatch-dropdown")){"swatch_dropdown_color"===attr_select.data("swatchtype")?attr_select.selectWoo({allowClear:!0,placeholder:choose_option_text,dropdownCssClass:"thwvsf_drop_swatch",templateResult:format_swatch_color,templateSelection:format_swatch_color,selectionAdapter:$.fn.selectWoo.amd.require("customSingleSelectionAdapter")}).addClass("enhanced"):attr_select.selectWoo({allowClear:!0,placeholder:choose_option_text,dropdownCssClass:"thwvsf_drop_swatch",templateResult:format_swatch_image,templateSelection:format_swatch_image,selectionAdapter:$.fn.selectWoo.amd.require("customSingleSelectionAdapter")}).addClass("enhanced")}})},thwvsf_public_var.selectWoo_enable&&$.fn.selectWoo&&$.fn.selectWoo.amd&&$.fn.selectWoo.amd.define("customSingleSelectionAdapter",["select2/utils","select2/selection/single"],function(Utils,SingleSelection){const adapter=SingleSelection;return adapter.prototype.update=function(data){if(0===data.length)return void this.clear();var selection=data[0],$rendered=this.$selection.find(".select2-selection__rendered"),formatted=this.display(selection,$rendered);$rendered.empty().append(formatted),$rendered.prop("title",selection.title||selection.text)},adapter}),$.fn.thwvsf_variation_form=function(){return new swatches_form(this),this},$(function(){"undefined"!=typeof wc_add_to_cart_variation_params&&$(".variations_form").each(function(){$(this).hasClass("th-var-active")||($(this).addClass("th-var-active"),$(this).thwvsf_variation_form())})});var clicked=null,selected=[]}var execute=!1;return initialize_thwvsf(),"flatsome"==thwvsf_public_var.is_quick_view?$(document).on("click",".quick-view",function(){execute||$(document).on("mfpOpen",function(){initialize_thwvsf(),execute=!0})}):"yith"==thwvsf_public_var.is_quick_view&&$(document).on("qv_loader_stop",function(){initialize_thwvsf()}),"wpc_smart"==thwvsf_public_var.is_quick_view&&$(document).ajaxComplete(function(event,request,options){request&&4===request.readyState&&200===request.status&&$(event.target).find("#woosq-popup").length>0&&initialize_thwvsf()}),"porto"===thwvsf_public_var.is_quick_view&&$(document).on("porto_init_countdown",function(){initialize_thwvsf()}),"woodmart"===thwvsf_public_var.is_quick_view&&$(document).on("wdQuickShopSuccess",function(){initialize_thwvsf()}),$(document).on("click",".owp-quick-view",function(e){var check=function(){$("#owp-qv-wrap").hasClass("is-visible")?init_thwvsf():setTimeout(check,1e3)};check()}),"pi_dcw"===thwvsf_public_var.is_quick_view&&$(document).on("click",".pisol_quick_view_button",function(){$(document).ajaxComplete(function(event,request,options){request&&4===request.readyState&&200===request.status&&$(event.target).find(".pisol-quick-view-box").length>0&&initialize_thwvsf()})}),{initialize_thwvsf:initialize_thwvsf}}(jQuery);