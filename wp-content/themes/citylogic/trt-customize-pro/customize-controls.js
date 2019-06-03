( function( api ) {

	// Extends our custom "citylogic" section.
	api.sectionConstructor['citylogic'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
