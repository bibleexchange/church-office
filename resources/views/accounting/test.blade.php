<!DOCTYPE html>
<html>
    <head>
		<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    </head>
    <body>
{!! Form::open(array('url'=>'accounting/gifts', 'class'=>'well form-inline','role'=>'form','id'=>'gifts')) !!}

		<input id="giver_1" name="giver" type="text" placeholder="U.S. state name">
		<input id="giverid_1" type="hidden" name="code">
		<div id="my-suggestions_1" ></div>
		
		<input id="giver_2" name="giver" type="text" placeholder="U.S. state name">
		<input id="giverid_2" type="text" name="code">
		<div id="my-suggestions_2" ></div>
		
		<input id="giver_3" name="giver" type="text" placeholder="U.S. state name">
		<input id="giverid_3" type="text" name="code">
		<div id="my-suggestions_3" ></div>
		
		<input id="giver_4" name="giver" type="text" placeholder="U.S. state name">
		<input id="giverid_4" type="text" name="code">
		<div id="my-suggestions_4" ></div>
	
			<script>
		var data = [
			{ value: "AL", label: "Alabama" },
			{ value: "AK", label: "Alaska" },
			{ value: "AZ", label: "Arizona" },
			{ value: "AR", label: "Arkansas" },
			{ value: "CA", label: "California" },
			{ value: "CO", label: "Colorado" },
			{ value: "CT", label: "Connecticut" },
			{ value: "DE", label: "Delaware" },
			{ value: "FL", label: "Florida" },
			{ value: "GA", label: "Georgia" },
			{ value: "HI", label: "Hawaii" },
			{ value: "ID", label: "Idaho" },
			{ value: "IL", label: "Illinois" },
			{ value: "IN", label: "Indiana" },
			{ value: "IA", label: "Iowa" },
			{ value: "KS", label: "Kansas" },
			{ value: "KY", label: "Kentucky" },
			{ value: "LA", label: "Louisiana" },
			{ value: "ME", label: "Maine" },
			{ value: "MD", label: "Maryland" },
			{ value: "MA", label: "Massachusetts" },
			{ value: "MI", label: "Michigan" },
			{ value: "MN", label: "Minnesota" },
			{ value: "MS", label: "Mississippi" },
			{ value: "MO", label: "Missouri" },
			{ value: "MT", label: "Montana" },
			{ value: "NE", label: "Nebraska" },
			{ value: "NV", label: "Nevada" },
			{ value: "NH", label: "New Hampshire" },
			{ value: "NJ", label: "New Jersey" },
			{ value: "NM", label: "New Mexico" },
			{ value: "NY", label: "New York" },
			{ value: "NC", label: "North Carolina" },
			{ value: "ND", label: "North Dakota" },
			{ value: "OH", label: "Ohio" },
			{ value: "OK", label: "Oklahoma" },
			{ value: "OR", label: "Oregon" },
			{ value: "PA", label: "Pennsylvania" },
			{ value: "RI", label: "Rhode Island" },
			{ value: "SC", label: "South Carolina" },
			{ value: "SD", label: "South Dakota" },
			{ value: "TN", label: "Tennessee" },
			{ value: "TX", label: "Texas" },
			{ value: "UT", label: "Utah" },
			{ value: "VT", label: "Vermont" },
			{ value: "VA", label: "Virginia" },
			{ value: "WA", label: "Washington" },
			{ value: "WV", label: "West Virginia" },
			{ value: "WI", label: "Wisconsin" },
			{ value: "WY", label: "Wyoming" }
		];
		$(function() {
			
			$("input[id^='giver_'").autocomplete({
				source: data,
				focus: function(event, ui) {
					// prevent autocomplete from updating the textbox
					event.preventDefault();
					// manually update the textbox
					$(this).val(ui.item.label);
				},
				
				appendTo: 'div[id^="#my-suggestions_"',
				
				select: function(event, ui) {
					// prevent autocomplete from updating the textbox
					event.preventDefault();
					// manually update the textbox and hidden field
					$(this).val(ui.item.label);
					$("input[id^='giverid_'").val(ui.item.value);
				}
			});
		});
	</script>
		
    </body>
</html>