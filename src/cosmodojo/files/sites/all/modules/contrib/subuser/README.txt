In order for a user to be able to create subusers they must at least have the
'create subuser 2' (authenticated user) permission. If the user may create
additional roles are then the roles field will be available to them when
creating users.


Variables
=========

subuser_relation: TRUE
  Set the default behavior for storing relations when creating subusers. This
  setting may be overridden by individual users with the
  'override subuser relation' permission. In order for the relation to be
  stored the relation module must be installed
  (http://drupal.org/project/relation).
subuser_list: Subusers
  Text to use for the view subuser menu tab.
