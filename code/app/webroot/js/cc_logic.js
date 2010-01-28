/*
	To use this file you need to add
		var citySelector = new CitySelector();
        var params = new Object();
        params.select1_id = 'dropDown1';
        params.select2_id = 'dropDown2';
		citySelector.init(params);
		params.strings - maps, localised strings to use
			params.strings['none'] = translation of “-- None selected --”
			params.strings['country_first'] = translation of “-- Select a country first --”
			If these strings are not set, then default english value is used.
	to the caller file
*/

function CitySelector()
{
	this.select1 = null; // select1 object
	this.select2 = null;
	this.add_none = null; // boolean, defines where we should add "none selected" or not, 
						  // TRUE by default
	this.strings = null;
	
	var self = null;
	
	this.init = function(params)
		{
			// params - object with parameters
			// params.select1_id, params.select2_id - ID of the <select> objects
			// params.selectedIndex1 and params.selectedIndex2 values of selected options, they are strings,
			//  i.e. it is actual country or/and city id.
			// params.add_none AS bool, if set to true, then we should add additional
			//   options - "Not selected"
			
			select1 = document.getElementById(params.select1_id);
			this.select1 = document.getElementById(params.select1_id);
			this.select2 = document.getElementById(params.select2_id);
			this.add_none = typeof(params.add_none) != 'undefined' ? params.add_none : true;

			if (!this.select1 || !this.select2)
				return;
				
			strings = new Array();
			strings['none'] = "-- None selected --";
			strings['country_first'] = "-- Select a country first --";
			
			this.strings = typeof(params.strings) != 'undefined' ? params.strings : strings;
				
			selectedIndex1 = typeof(params.selectedIndex1) != 'undefined' ? params.selectedIndex1 : '0';
			selectedIndex2 = typeof(params.selectedIndex2) != 'undefined' ? params.selectedIndex2 : '0';
  
			this.select1.options.length = 0;
			this.select2.options.length = 0;
			
			// TODO: multi language
			if (this.add_none)
			{
				this.select1.options.add(new Option(this.strings['none'], 0));
				this.select2.options.add(new Option(this.strings['none'], 0));
			}
			
			for (var key in countriesAndCites)
			{
				for (var key2 in countriesAndCites[key])
				{
					// key ===> id
					// key2 ===> country name. Should be put in select1
					
					// value first, then id
					var country_opt = new Option(key2, key); 
					this.select1.options.add(country_opt);
					
					// we need to populate only the country list right now
					// for (var key3 in countriesAndCites[key][key2]) // <- Crazzy :-)
					// {
						// // elem ===> [1, '<name'>]
						// var elem = countriesAndCites[key][key2];
						// //alert(elem[key3]);
						// var city_opt = new Option(elem[1], elem[0]);
						// select2.options.add(country_opt);
					// }
				}
				
			}
            
            self = this;
			
			// set up handler
			this.select1.onchange = function()
				{
                    self.ChangeSecondDropContent();
				}
			
			self.SelectByValue(this.select1, selectedIndex1);
            this.ChangeSecondDropContent();
			self.SelectByValue(this.select2, selectedIndex2);
		}
		
	//===================================================================================
	this.ChangeSecondDropContent = function()
		{
            var country_name = this.select1.options[this.select1.selectedIndex].text;
            var country_id = this.select1.options[this.select1.selectedIndex].value;

			// removes all options from select 2
			this.select2.options.length = 0;
			
			if (this.add_none)
			{
				this.select2.options.add(new Option(this.strings['none'], 0));
			}
			
			if (country_id == 0)
			{
                // void the options, to be on the safe side
                this.select2.options.length = 0;
				// nothing selected
				this.select2.options.add(new Option(this.strings['country_first'], 0));
				return;
			}

			// adds new options to select 2
			var countryArray = countriesAndCites[country_id][country_name];

			if (countryArray) 
			{
				for (var i=0; i < countryArray.length; i++) 
				{
					var city = countryArray[i];
					var option = new Option(city[1], city[0]);
					this.select2.options.add (option);
				}
			}
		}
        
    //===================================================================================      
    this.SelectByValue = function(container, value)
    {
        for (i=0; i < container.options.length; i++)
        {
            //alert('Search: ' + value + ', got: ' + container.options[i].value);
            if (container.options[i].value == value)
            {
                container.options[i].selected = true;
                break;
            }
        }
    }
}