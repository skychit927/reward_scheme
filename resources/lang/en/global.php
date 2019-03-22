<?php

return [
	'daily-income' => [
		'title' => 'Cinema Daily Income'
	],
	'cash-register' => [
		'title' => 'Daily Ticket Seller Cash Register'
	],
	'day-end' => [
		'title' => 'Day End'
	],

	'user-management' => [
		'title' => 'User Management',
		'fields' => [
		],
	],

	'permissions' => [
		'title' => 'Permission Management',
		'fields' => [
			'title' => 'Title',
		],
	],

	'roles' => [
		'title' => 'User Group/Role Management',
		'fields' => [
			'title' => 'Title',
			'permission' => 'Permissions',
		],
	],

	'users' => [
		'title' => 'User Management',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
            'remember-token' => 'Remember token',
            'location' => 'Location'
		],
	],

	'user-actions' => [
		'title' => 'Activity Log',
		'created_at' => 'Time',
		'fields' => [
			'user' => 'User',
			'action' => 'Action',
			'action-model' => 'Action model',
			'action-id' => 'Action id',
		],
	],

	'movie-management' => [
		'title' => 'Movie Information',
		'fields' => [
		],
	],

	'schedule-management' => [
		'title' => 'Schedule Management',
		'fields' => [
		],
	],

	'general' => [
		'title' => 'General',
		'fields' => [
		],
	],

	'change-password' => [
		'title' => 'Change Password',
		'fields' => [
		],
	],

	'ticket-payment' => [
		'title' => 'Ticket & Payment',
		'fields' => [
		],
	],

	'admin' => [
		'title' => 'Admin',
		'fields' => [
		],
	],

	'membership-management' => [
		'title' => 'Membership Management',
		'fields' => [
		],
	],

	'promotion-management' => [
		'title' => 'Promotion Management',
		'fields' => [
		],
	],

	'transaction-enquiry' => [
		'title' => 'Transaction Enquiry',
		'fields' => [
		],
	],

	'daily-operations' => [
		'title' => 'Daily Operations',
		'fields' => [
		],
	],

	'emembership-ecoupon' => [
		'title' => 'Emembership & Ecoupon',
		'fields' => [
		],
	],

	'genre' => [
		'title' => 'Movie Genre',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'short-code' => 'Short Code ',
			'active' => 'Active',
		],
	],

	'distributor' => [
		'title' => 'Movie Distributor',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'short-code' => 'Short Code',
			'logo' => 'Logo',
			'active' => 'Active',
		],
	],

	'nation' => [
		'title' => 'Movie Nation',
		'fields' => [
			'name' => 'Name ',
			'name-local' => 'Name (Local)',
			'active' => 'Active',
		],
	],

	'dialect' => [
		'title' => 'Movie Dialect',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'active' => 'Active',
		],
	],

	'subititles' => [
		'title' => 'Movie Subititles',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'active' => 'Active',
		],
	],

	'movie' => [
		'title' => 'Movie Admin',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'short-name' => 'Short Name',
			'short-name-local' => 'Short Name (Local)',
			'dialect' => 'Dialect',
			'subitile' => 'Subitile',
			'genre' => 'Genre',
			'distributor' => 'Distributor',
			'nation' => 'Nation',
			'news' => 'News',
			'news-local' => 'News (Local)',
			'director' => 'Director',
			'director-local' => 'Director (Local)',
			'cast' => 'Cast',
			'cast-local' => 'Cast (Local)',
			'synopsis' => 'Synopsis',
			'synopsis-local' => 'Synopsis (Local)',
			'additional-info' => 'Additional Information',
			'additional-info-local' => 'Additional Information (Local)',
			'circuit-film-id' => 'Circuit Film ID',
			'classification' => 'Classification',
			'duration' => 'Duration',
			'movie-tags' => 'Movie Tags',
			'promote-to-top' => 'Promote to top',
			'main-poster' => 'Main Poster',
			'sub-poster' => 'Sub Poster',
			'still' => 'Still',
			'home-page' => 'Home Page',
			'trailer' => 'Trailer',
			'youtube' => 'Youtube',
			'facebook' => 'Facebook',
			'open-date' => 'Release Date',
			'close-date' => 'Close Date',
			'movie-group' => 'Movie Group',
			'version-group' => 'Version Group',
			'hkta-film-master-id' => 'HKTA Film Master ID',
			'hkta-film-id' => 'HKTA Film ID',
			'is-show-taking' => 'HKTA Show Taking',
			'publish' => 'Publish',
			'publish-date' => 'Publish Date',
			'last-modified-by' => 'Last Modified By',
			'active' => 'Active',
        ],
        'option' => ['I', 'IIA', 'IIB', 'III']
	],

	'movie-group' => [
		'title' => 'Movie Group',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'short-name' => 'Short Name',
			'short-name-local' => 'Short Name (Local)',
			'movie-id' => 'Movie',
			'main-poster' => 'Main Poster',
			'sub-poster' => 'Sub Poster',
			'sequence' => 'Sequence',
			'active' => 'Active',
		],
	],

	'version-group' => [
		'title' => 'Movie Version Group',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'short-name' => 'Short Name',
			'short-name-local' => 'Short Name (Local)',
			'main-poster' => 'Main Poster',
			'sub-poster' => 'Sub Poster',
			'movie-id' => 'Movie',
			'active' => 'Active',
		],
	],

	'payment-type' => [
		'title' => 'Payment Type',
		'fields' => [
			'payment-type-code' => 'Payment Type Code',
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'type' => 'Type',
			'is-refundable' => 'Refundable',
			'is-pos' => 'Point of Sale',
			'is-add-points' => 'Add  Member Points',
			'sequence' => 'Sequence',
			'active' => 'Active',
        ],
        'option' => ['Cash', 'Credit Card', 'Coupon', 'Other'],
	],

	'ticket-type' => [
		'title' => 'Ticket Type Management',
		'fields' => [
			'ticket-type-code' => 'Ticket Type Code',
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'short-name' => 'Short Name',
			'short-name-local' => 'Short Name (Local)',
			'price' => 'Price',
			'base-price' => 'Base Price',
			'display-price' => 'Display Price',
			'additional-charge' => 'Additional Charge',
			'coupon' => 'Coupon',
			'payment-type' => 'Payment type',
			'default-payment-type' => 'Default Payment Type',
			'remarks' => 'Remarks',
			'is-show-taking' => 'HKTA Show Taking',
			'replaced-by-ticket-type-code' => 'Replaced by Ticket Type Code',
			'is-refundable' => 'Refundable',
			'refund-ticket-type' => 'Refund Ticket Type',
			'is-package-only' => 'Package Only',
            'is-add-points' => 'Add Points',
            'fnb_set' => 'F&B Set',
			'channel' => 'Channel',
			'active' => 'Active',
		],
	],

	'tags' => [
		'title' => 'Tag Management',
		'fields' => [
			'tag-name' => 'Tag Name',
			'tag-type' => 'Tag Type',
			'active' => 'Active',
		],
	],

	'channel-management' => [
		'title' => 'Channel',
		'fields' => [
		],
	],

	'fnb-category' => [
		'title' => 'F&B Category Management',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'desc' => 'Description',
            'desc-local' => 'Description (Local)',
            'tag-colour' => 'Tag Colour',
            'fnb-item' => 'F&B Item',
            'fnb-set' => 'F&B Set',
			'active' => 'Active',
		],
	],

	'fnb-set' => [
		'title' => 'F&B Sets Management',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'fnb-item-id' => 'F&B Item',
			'price' => 'Price',
			'desc' => 'Description',
			'desc-local' => 'Description (Local)	',
			'image' => 'Image',
			'active' => 'Active',
		],
	],

	'fnb-item' => [
		'title' => 'F&B Product Management',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'desc' => 'Description',
			'desc-local' => 'Description (Local)',
			'is-available' => 'Available',
			'is-individual' => 'Individual',
            'price' => 'Price',
            'upgrade-price' => 'Upgrade Price',
            'image' => 'Image',
			'fnb-category' => 'F&b Category',
			'active' => 'Active',
		],
	],

	'additional-charge' => [
		'title' => 'Additional Charge Management',
		'fields' => [
			'price' => 'Price',
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'remark' => 'Remark',
			'active' => 'Active',
		],
	],

	'channel' => [
		'title' => 'Channel Management',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'channel-type' => 'Channel type',
			'active' => 'Active',
        ],
        'option' => ['Onsite', 'Online', 'Remote','Agency']
	],

	'ticket-set' => [
		'title' => 'Ticket Set Management',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'desc' => 'Description',
			'desc-local' => 'Description (Local)',
			'ticket-type' => 'Ticket Type',
			'price' => 'Price',
			'active' => 'Active',
		],
	],

	'coupon-type' => [
		'title' => 'Coupon Type Managemnet',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'price' => 'Price',
			'remark' => 'Remark',
			'is-complimentary' => 'Complimentary',
			'is-member-only' => 'Member only',
			'active' => 'Active',
		],
	],

	'ticket-group' => [
		'title' => 'Ticket Group Management',
		'fields' => [
			'ticket-group-code' => 'Ticket Group Code',
			'name' => 'Name',
			'name-local' => 'Name (Local)',
            'ticket-type' => 'Ticket Type',
            'ticket-set' => 'Ticket Set',
			'default-ticket-type' => 'Default Ticket Type',
			'active' => 'Active',
		],
	],

	'venue-management' => [
		'title' => 'Venue Management',
		'fields' => [
		],
	],

	'operator' => [
		'title' => 'Operator Management',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'active' => 'Active',
		],
	],

	'location' => [
		'title' => 'Location Mangement',
		'fields' => [
			'operator' => 'Operator',
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'address' => 'Address',
			'address-local' => 'Address (Local)',
			'telephone' => 'Telephone',
            'sequence' => 'Sequence',
            'operation-date' => 'Operation Date',
			'active' => 'Active',
		],
	],

	'venue' => [
		'title' => 'Venue Management',
		'fields' => [
			'location' => 'Location',
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'short-name' => 'Short Name',
			'short-name-local' => 'Short Name (Local)',
			'desc' => 'Description',
			'desc-local' => 'Description (Local)',
			'venue-type' => 'Venue Type',
			'sequence' => 'Sequence',
			'active' => 'Active',
		],
	],

	'zone' => [
		'title' => 'Zone Management',
		'fields' => [
			'venue' => 'Venue',
			'name' => 'Name',
			'name-local' => 'Name(Local)',
			'desc' => 'Description',
			'desc-local' => 'Description (Local)',
			'x' => 'X',
			'y' => 'Y',
			'boundary' => 'Boundary',
			'sequence' => 'Sequence',
			'active' => 'Active',
		],
	],

	'space-type' => [
		'title' => 'Space Type Management',
		'fields' => [
			'type-name' => 'Type Name',
			'short-code' => 'Short Code',
			'is-disable' => 'Disable',
			'is-motion' => 'Motion',
			'is-double' => 'Double',
			'icon-available' => 'Icon Available',
			'icon-processing' => 'Icon Processing',
			'icon-sold' => 'Icon Sold',
			'icon-repair' => 'Icon Repair',
			'icon-selected' => 'Icon Selected',
			'icon-reserved' => 'Icon Reserved',
			'icon-select-reserved' => 'Icon Select Reserved',
            'is-vibrate' => 'Vibrate',
            'is-vendible' => 'Vendible',
			'active' => 'Active',
		],
	],

	'space' => [
		'title' => 'Space Management',
		'fields' => [
			'zone' => 'Zone id',
			'space-type' => 'Space Type',
			'display-type' => 'Display Type',
			'row' => 'Row',
			'column' => 'Column',
			'row-name' => 'Row Name',
			'column-name' => 'Column Name',
			'link-id' => 'Link ID',
			'direction' => 'Direction',
			'link-row' => 'Link Row',
			'link-column' => 'Link Column',
			'tab-index' => 'Tab Index',
			'x' => 'X',
			'y' => 'Y',
			'space-property' => 'Space Property',
			'active' => 'Active',
		],
	],

	'show' => [
		'title' => 'Schedule Management',
		'fields' => [
			'venue' => 'Venue',
			'movie' => 'Movie',
			'ticket-group' => 'Ticket Group',
			'show-time' => 'Show Time',
			'show-number' => 'Show Number',
            'show-tags' => 'Show Tags',
            'channels' => 'Channels',
			'is-freeseating' => 'Free Seating',
			'is-firstshow' => 'First Show',
			'fnb-cutoff-date' => 'F&B Cut Off Date',
            'active' => 'Active',
            'status' => 'Release',
            'release-date' => 'Release Date',
		],
	],

	'transaction' => [
		'title' => 'Transaction Enquiry',
		'fields' => [
			'trans_date' => 'Trans Date',
			'trans_type' => 'Trans Type',
			'ticket_type' => 'Ticket Type',
			'trans_no' => 'Trans No.',
			'payment_type' => 'Payment Type',
			'trans_amount' => 'Trans Amount',
			'house' => 'House',
			'show_date' => 'Show Date',
			'show_no' => 'Show No.',
			'movie_name' => 'Movie Name',
			'ticket_no_from' => 'Ticket No. From',
			'ticket_no_to' => 'Ticket No. To',
			'seat_no' => 'Seat No.',
			'member_id' => 'Member ID',
			'user' => 'User',
		],
	],

	'space-status' => [
		'title' => 'Space Status',
		'fields' => [
			'show' => 'Show',
			'venue' => 'Venue',
			'space' => 'Space',
			'status' => 'Status',
			'transaction' => 'Transaction',
			'user' => 'Staff',
		],
	],

	'membership' => [
		'title' => 'Membership',
		'fields' => [
		],
	],

	'member' => [
		'title' => 'Member Management',
		'fields' => [
			'email' => 'Email',
			'password' => 'Password',
			'title' => 'Title',
			'first-name' => 'First Name',
			'last-name' => 'Last Name',
			'first-name-local' => 'First Name (Local)',
			'last-name-local' => 'Last Name (Local)',
			'mobile-no' => 'Mobile',
			'birthday' => 'Birthday',
			'gender' => 'Gender',
			'address' => 'Address',
			'member-since' => 'Member Since',
			'expiry-date' => 'Expiry Date',
			'register-date' => 'Register Date',
			'renewal-date' => 'Renewal Date',
			'upgrade-date' => 'Upgrade Date',
			'downgrade-date' => 'Downgrade Date',
			'last-expiry-date' => 'Last Expiry Date',
			'last-renewal' => 'Last Renewal',
			'last-upgrade-date' => 'Last Upgrade Date',
			'last-downgrade-date' => 'Last Downgrade Date',
			'birthday-gift' => 'Birthday Gift',
			'last-birthday-gift-date' => 'Last Birthday Gift Date',
			'welcome-gift' => 'Welcome Gift',
			'last-welcome-gift-date' => 'Last Welcome Gift Date',
			'remark' => 'Remark',
			'member-type' => 'Member Type',
			'point' => 'Point',
			'channel' => 'Channel',
			'accept-promo' => 'Accept Promo',
			'active' => 'Active',
		],
	],

	'member-type' => [
		'title' => 'Member Type Management',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'desc' => 'Description',
			'desc-local' => 'Desc (Local)',
			'is-free-member' => 'Is Free Member',
			'welcome-points' => 'Welcome Points',
			'is-add-points' => 'Is Add Points',
			'member-fee-type' => 'Member Fee Type',
			'active' => 'Active',
		],
	],

	'member-fee' => [
		'title' => 'Member Price / Fee',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'desc' => 'Description',
			'amount' => 'Amount',
			'point' => 'Point',
			'active' => 'Active',
		],
	],

	'payment-log' => [
		'title' => 'Payment Log',
		'fields' => [
		],
	],

	'membership-plan' => [
		'title' => 'Membership Plan',
		'fields' => [
			'name' => 'Name',
			'name-local' => 'Name (Local)',
			'desc' => 'Desc',
			'desc-local' => 'Desc (Local)',
			'plan-type' => 'Plan Type',
			'value' => 'Value',
			'channel' => 'Channel',
			'valid-period' => 'Valid Period',
			'member-type-from' => 'Member Type From',
			'member-type-to' => 'Member Type To',
		],
	],

	'member-transaction' => [
		'title' => 'Member Transaction',
		'fields' => [
			'plan' => 'Plan',
			'amount' => 'Amount',
			'member' => 'Member',
			'transaction-date' => 'Transaction Date',
			'online-transaction-id' => 'Online Transaction Id',
			'location' => 'Location',
			'payment-type' => 'Payment Type',
			'payment-reference-no' => 'Payment Reference No',
			'desc' => 'Description',
			'handled-by' => 'Handled By',
			'modified-by' => 'Modified By',
			'active' => 'Active',
		],
	],

	'member-activity-log' => [
		'title' => 'Member Activity Log',
		'fields' => [
			'log-date' => 'Log Date',
			'type' => 'Type',
			'log-message' => 'Log Message',
			'source' => 'Source',
			'user' => 'User',
			'value' => 'Value',
		],
	],

	'points-log' => [
		'title' => 'Points Log',
		'fields' => [
			'log-date' => 'Log Date',
			'type' => 'Type',
			'log-message' => 'Log Message',
			'source' => 'Source',
			'user' => 'User',
			'value' => 'Value',
		],
	],
	'app_create' => 'Create',
	'app_save' => 'Save',
	'app_edit' => 'Edit',
	'app_restore' => 'Restore',
	'app_permadel' => 'Delete Permanently',
	'app_all' => 'All',
	'app_trash' => 'Trash',
	'app_view' => 'View',
	'app_update' => 'Update',
	'app_list' => 'List',
	'app_no_entries_in_table' => 'No entries in table',
	'app_custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Logout',
	'app_add_new' => 'Add new',
	'app_are_you_sure' => 'Are you sure?',
	'app_back_to_list' => 'Back to list',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Delete',
	'app_delete_selected' => 'Delete selected',
	'app_category' => 'Category',
	'app_categories' => 'Categories',
	'app_sample_category' => 'Sample category',
	'app_questions' => 'Questions',
	'app_question' => 'Question',
	'app_answer' => 'Answer',
	'app_sample_question' => 'Sample question',
	'app_sample_answer' => 'Sample answer',
	'app_faq_management' => 'FAQ Management',
	'app_administrator_can_create_other_users' => 'Administrator (can create other users)',
	'app_simple_user' => 'Simple user',
	'app_title' => 'Title',
	'app_roles' => 'Roles',
	'app_role' => 'Role',
	'app_user_management' => 'User management',
	'app_users' => 'Users',
	'app_user' => 'User',
	'app_name' => 'Name',
	'app_username' => 'Username',
	'app_password' => 'Password',
	'app_remember_token' => 'Remember token',
	'app_permissions' => 'Permissions',
	'app_user_actions' => 'User actions',
	'app_action' => 'Action',
	'app_action_model' => 'Action model',
	'app_action_id' => 'Action id',
	'app_time' => 'Time',
	'app_campaign' => 'Campaign',
	'app_campaigns' => 'Campaigns',
	'app_description' => 'Description',
	'app_valid_from' => 'Valid from',
	'app_valid_to' => 'Valid to',
	'app_discount_amount' => 'Discount amount',
	'app_discount_percent' => 'Discount percent',
	'app_coupons_amount' => 'Coupons amount',
	'app_coupons' => 'Coupons',
	'app_code' => 'Code',
	'app_redeem_time' => 'Redeem time',
	'app_coupon_management' => 'Coupon Management',
	'app_time_management' => 'Time management',
	'app_projects' => 'Projects',
	'app_reports' => 'Reports',
	'app_time_entries' => 'Time entries',
	'app_work_type' => 'Work type',
	'app_work_types' => 'Work types',
	'app_project' => 'Project',
	'app_start_time' => 'Start time',
	'app_end_time' => 'End time',
	'app_expense_category' => 'Expense Category',
	'app_expense_categories' => 'Expense Categories',
	'app_expense_management' => 'Expense Management',
	'app_expenses' => 'Expenses',
	'app_expense' => 'Expense',
	'app_entry_date' => 'Entry date',
	'app_amount' => 'Amount',
	'app_income_categories' => 'Income categories',
	'app_monthly_report' => 'Monthly report',
	'app_companies' => 'Companies',
	'app_company_name' => 'Company name',
	'app_address' => 'Address',
	'app_website' => 'Website',
	'app_contact_management' => 'Contact management',
	'app_contacts' => 'Contacts',
	'app_company' => 'Company',
	'app_first_name' => 'First name',
	'app_last_name' => 'Last name',
	'app_phone' => 'Phone',
	'app_phone1' => 'Phone 1',
	'app_phone2' => 'Phone 2',
	'app_skype' => 'Skype',
	'app_photo' => 'Photo (max 8mb)',
	'app_category_name' => 'Category name',
	'app_product_management' => 'Product management',
	'app_products' => 'Products',
	'app_product_name' => 'Product name',
	'app_price' => 'Price',
	'app_tags' => 'Tags',
	'app_tag' => 'Tag',
	'app_photo1' => 'Photo1',
	'app_photo2' => 'Photo2',
	'app_photo3' => 'Photo3',
	'app_calendar' => 'Calendar',
	'app_statuses' => 'Statuses',
	'app_task_management' => 'Task management',
	'app_tasks' => 'Tasks',
	'app_status' => 'Status',
	'app_attachment' => 'Attachment',
	'app_due_date' => 'Due date',
	'app_assigned_to' => 'Assigned to',
	'app_assets' => 'Assets',
	'app_asset' => 'Asset',
	'app_serial_number' => 'Serial number',
	'app_location' => 'Location',
	'app_locations' => 'Locations',
	'app_assigned_user' => 'Assigned (user)',
	'app_notes' => 'Notes',
	'app_assets_history' => 'Assets history',
	'app_assets_management' => 'Assets management',
	'app_slug' => 'Slug',
	'app_content_management' => 'Content management',
	'app_text' => 'Text',
	'app_excerpt' => 'Excerpt',
	'app_featured_image' => 'Featured image',
	'app_pages' => 'Pages',
	'app_axis' => 'Axis',
	'app_show' => 'Show',
	'app_group_by' => 'Group by',
	'app_chart_type' => 'Chart type',
	'app_create_new_report' => 'Create new report',
	'app_no_reports_yet' => 'No reports yet.',
	'app_created_at' => 'Created at',
	'app_updated_at' => 'Updated at',
	'app_deleted_at' => 'Deleted at',
	'app_reports_x_axis_field' => 'X-axis - please choose one of date/time fields',
	'app_reports_y_axis_field' => 'Y-axis - please choose one of number fields',
	'app_select_crud_placeholder' => 'Please select one of your CRUDs',
	'app_select_dt_placeholder' => 'Please select one of date/time fields',
	'app_aggregate_function_use' => 'Aggregate function to use',
	'app_x_axis_group_by' => 'X-axis group by',
	'app_x_axis_field' => 'X-axis field (date/time)',
	'app_y_axis_field' => 'Y-axis field',
	'app_integer_float_placeholder' => 'Please select one of integer/float fields',
	'app_change_notifications_field_1_label' => 'Send email notification to User',
	'app_change_notifications_field_2_label' => 'When Entry on CRUD',
	'app_select_users_placeholder' => 'Please select one of your Users',
	'app_is_created' => 'is created',
	'app_is_updated' => 'is updated',
	'app_is_deleted' => 'is deleted',
	'app_notifications' => 'Notifications',
	'app_notify_user' => 'Notify User',
	'app_when_crud' => 'When CRUD',
	'app_create_new_notification' => 'Create new Notification',
	'app_stripe_transactions' => 'Stripe Transactions',
	'app_upgrade_to_premium' => 'Upgrade to Premium',
	'app_messages' => 'Messages',
	'app_you_have_no_messages' => 'You have no messages.',
	'app_all_messages' => 'All Messages',
	'app_new_message' => 'New message',
	'app_outbox' => 'Outbox',
	'app_inbox' => 'Inbox',
	'app_recipient' => 'Recipient',
	'app_subject' => 'Subject',
	'app_message' => 'Message',
	'app_send' => 'Send',
	'app_reply' => 'Reply',
	'app_calendar_sources' => 'Calendar sources',
	'app_new_calendar_source' => 'Create new calendar source',
	'app_crud_title' => 'Crud title',
	'app_crud_date_field' => 'Crud date field',
	'app_prefix' => 'Prefix',
	'app_label_field' => 'Label field',
	'app_suffix' => 'Sufix',
	'app_no_calendar_sources' => 'No calendar sources yet.',
	'app_crud_event_field' => 'Event label field',
	'app_create_new_calendar_source' => 'Create new Calendar Source',
	'app_edit_calendar_source' => 'Edit Calendar Source',
	'app_client_management' => 'Client management',
	'app_client_management_settings' => 'Client management settings',
	'app_country' => 'Country',
	'app_client_status' => 'Client status',
	'app_clients' => 'Clients',
	'app_client_statuses' => 'Client statuses',
	'app_currencies' => 'Currencies',
	'app_main_currency' => 'Main currency',
	'app_documents' => 'Documents',
	'app_file' => 'File',
	'app_income_source' => 'Income source',
	'app_income_sources' => 'Income sources',
	'app_fee_percent' => 'Fee percent',
	'app_note_text' => 'Note text',
	'app_client' => 'Client',
	'app_start_date' => 'Start date',
	'app_budget' => 'Budget',
	'app_project_status' => 'Project status',
	'app_project_statuses' => 'Project statuses',
	'app_transactions' => 'Transactions',
	'app_transaction_types' => 'Transaction types',
	'app_transaction_type' => 'Transaction type',
	'app_transaction_date' => 'Transaction date',
	'app_currency' => 'Currency',
	'app_current_password' => 'Current password',
	'app_new_password' => 'New password',
	'app_password_confirm' => 'New password confirmation',
	'app_dashboard_text' => 'You are logged in!',
	'app_forgot_password' => 'Forgot your password?',
	'app_remember_me' => 'Remember me',
	'app_login' => 'Login',
	'app_change_password' => 'Change password',
	'app_csv' => 'CSV',
	'app_print' => 'Print',
	'app_excel' => 'Excel',
	'app_copy' => 'Copy',
	'app_colvis' => 'Column visibility',
	'app_pdf' => 'PDF',
	'app_reset_password' => 'Reset password',
	'app_reset_password_woops' => '<strong>Whoops!</strong> There were problems with input:',
	'app_email_line1' => 'You are receiving this email because we received a password reset request for your account.',
	'app_email_line2' => 'If you did not request a password reset, no further action is required.',
	'app_email_greet' => 'Hello',
	'app_email_regards' => 'Regards',
	'app_confirm_password' => 'Confirm password',
	'app_if_you_are_having_trouble' => 'If you’re having trouble clicking the',
	'app_copy_paste_url_bellow' => 'button, copy and paste the URL below into your web browser:',
	'app_please_select' => 'Please select',
	'app_register' => 'Register',
	'app_registration' => 'Registration',
	'app_not_approved_title' => 'You are not approved',
	'app_not_approved_p' => 'Your account is still not approved by administrator. Please, be patient and try again later.',
	'app_there_were_problems_with_input' => 'There were problems with input',
	'app_whoops' => 'Whoops!',
	'app_file_contains_header_row' => 'File contains header row?',
	'app_csvImport' => 'CSV Import',
	'app_csv_file_to_import' => 'CSV file to import',
	'app_parse_csv' => 'Parse CSV',
	'app_import_data' => 'Import data',
	'app_imported_rows_to_table' => 'Imported :rows rows to :table table',
	'app_subscription-billing' => 'Subscriptions',
	'app_subscription-payments' => 'Payments',
	'app_basic_crm' => 'Basic CRM',
	'app_customers' => 'Customers',
	'app_customer' => 'Customer',
	'app_select_all' => 'Select all',
	'app_deselect_all' => 'Deselect all',
	'app_team-management' => 'Teams',
	'app_team-management-singular' => 'Team',
	'global_title' => 'Reward Scheme',
];
