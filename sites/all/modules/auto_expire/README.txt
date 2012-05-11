// $Id: README.txt,v 1.5 2009/06/04 23:19:37 marcvangend Exp $

This module allows site administrators to set expiration times for content types.

End users creating content that has auto expiry set cannot control the expiry time. They
could be allowed to renew the content for one or more cycles.

Before a node is expired a warning message is sent to the user that created that node. If
the user has the proper rights then he can extend the node.

A node is unpublished on the first cron run after the expiry date. Nodes that have
expired for a certain amount of time can be automatically purged.

This module is ideal for content that is allowed only for a limited time, like
classified listings.

Somewhat similar modules are Scheduler and Node Expire. Scheduler allows the user
creating the node to set the expiry time, Auto Expire enforces an expiry time set by
the administrator. Node Expire allows both default settings for each node type and
individual settings for nodes, content is expired based on last update time. Auto
Expire is expiring content based on creation time, and content has to be explicitly
extended (a simple update is not sufficient).


For configuration use admin/config/content/auto_expire (Configuration->Content authoring->Auto Expire)

Expire info for node appears as a tab when viewing/editing node.