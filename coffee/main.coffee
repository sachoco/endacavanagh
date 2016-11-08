sanitise_str =(str) ->
	if str && str != ""
		return 'jckpc-'+str.replace(/[^a-zA-Z0-9-_]/g,'-').toLowerCase()
	return ""

jQuery ($) ->
	$("#jckpc_images").hide()
	varSelects = 'form.variations_form select'

	$('#category-menu').on 'touchstart', ->
		# elm = $(this).find('ul')
		# if elm.css('display') == 'block'
		# 	elm.css('display', 'none')
		$(this).addClass('touch').toggleClass('active')
	# finishSelect = 'select#pa_finish'
	# glassSelect = 'select#pa_glass-option'
	# $(glassSelect).closest('tr').find('.label, .value .dropdown-select').hide()

	# $(document).on 'change', finishSelect, ->
	# 	if $(glassSelect).find('option').length > 2
	# 		$(glassSelect).closest('tr').find('.label, .value .dropdown-select').fadeIn()
	# 	else
	# 		$(glassSelect).prop('selectedIndex', 1).trigger("change").closest('tr').find('.label, .value .dropdown-select').fadeOut()
	$('.size-finish-info a').on 'click', ->
		p = $(".entry-footer").offset().top
		$('html,body').animate({ scrollTop: p }, 800, 'easeInOutCubic')

	$(document).on 'change', varSelects, ->
		$selectField = $(this)
		$variationsForm = $selectField.closest('form')
		selectedAtt = sanitise_str($selectField.attr('name'))
		selectedVal = sanitise_str($selectField.val())
		if selectedVal.length > 0 
			# $("#image_container").fadeOut(200, ->
			# 	$("#jckpc_images").fadeIn(200)
			# ) 
			$("#image_container").addClass("hidden")
			$("#jckpc_images").fadeIn(200)
		else
			# $("#jckpc_images").fadeOut(200, ->
			# 	$("#image_container").fadeIn(200)
			# )
			$("#jckpc_images").fadeOut(200)
			$("#image_container").removeClass("hidden")

		$(varSelects).each (index) ->
			# console.log($this+" : "+$this.find('option').length)
			$(this).prop( "disabled", false )
			if $(this).find('option').length == 2
				# $(this).prop( "disabled", true )
				if $(this).prop('selectedIndex') != 1
					$(this).prop('selectedIndex', 1).trigger("change")
					# $(this).closest('tr').find('.label, .value .dropdown-select').hide()
					# $(this).closest('tr').find('.value .dropdown-select').hide()

	@