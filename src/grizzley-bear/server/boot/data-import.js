module.exports = function(app) {
	// Create sample user
	app.models.Profile.create({
		username: 'admin',
		email: 'test@example.com',
		password: '1',
		phone: 9713229312
	}, function(err, profiles) {
		if (err) {
			throw err;
		}
		console.log('Created ' + (profiles.length || 1) + ' profiles');
	});

	// Import providers
	app.models.Provider.create([
		{
			name: 'St. Vincent',
			category: 'Jobs,Shelter,Clothing/Personal Care/Shoes',
			phone: 9713229312,
			voice: true
		},
		{
			name: 'Goodwill',
			category: 'Jobs,Clothing/Personal Care/Shoes'
		},
		{
			name: 'Lane Workforce Partnership',
			category: 'Jobs'
		},
		{
			name: 'Job Corps',
			category: 'Jobs'
		},
		{
			name: 'NW Youth Corps',
			category: 'Jobs'
		},
		{
			name: 'Looking Glass Station 7',
			category: 'Shelter'
		},
		{
			name: 'DHS Youth Shelter',
			category: 'Shelter'
		},
		{
			name: 'Sheltercare',
			category: 'Shelter'
		},
		{
			name: 'Hosea Youth Services',
			category: 'Shelter'
		},
		{
			name: 'Safe Families',
			category: 'Shelter'
		},
		{
			name: 'A Family For Every Child',
			category: 'Mentor Advocates'
		},
		{
			name: 'YMCA Rise',
			category: 'Mentor Advocates'
		},
		{
			name: 'CASA of Lane County',
			category: 'Mentor Advocates'
		},
		{
			name: 'Assistance League',
			category: 'Clothing/Personal Care/Shoes'
		},
		{
			name: 'Looking Glass',
			category: 'Mental Health Services'
		},
		{
			name: 'Willamette Family Treatment',
			category: 'Mental Health Services'
		},
		{
			name: 'PeaceHealth',
			category: 'Mental Health Services'
		},
		{
			name: 'Direction Services',
			category: 'Mental Health Services'
		},
		{
			name: 'Center for Community Counseling',
			category: 'Mental Health Services'
		},
		{
			name: 'UO Family Human Services',
			category: 'Mental Health Services'
		}
	], function(err, providers) {
		if (err) {
			throw err;
		}
		console.log('Imported ' + providers.length + ' providers');
	});
};
