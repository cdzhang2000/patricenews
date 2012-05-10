<?php
/*YToxOntzOjMyOiJiODYzMjNhNzNhNGVjYzY3YmNhMTRmNDFkNzc1MDc5NCI7YTo5OntpOjA7Tzo4OiJzdGRDbGFzcyI6NDp7czoyOiJJRCI7czoxOiI5IjtzOjEyOiJkaXNwbGF5X25hbWUiO3M6MTA6ImJsb2dfZ3JvdXAiO3M6ODoiZGVzY3JpcHQiO3M6MTQ6ImVkaXQgYmxvZyBwb3N0IjtzOjc6Im1ldGFfaWQiO047fWk6MTtPOjg6InN0ZENsYXNzIjo0OntzOjI6IklEIjtzOjE6IjYiO3M6MTI6ImRpc3BsYXlfbmFtZSI7czoxMToiW0Fub255bW91c10iO3M6ODoiZGVzY3JpcHQiO3M6MzE6IkFub255bW91cyB1c2VycyAobm90IGxvZ2dlZCBpbikiO3M6NzoibWV0YV9pZCI7czo3OiJ3cF9hbm9uIjt9aToyO086ODoic3RkQ2xhc3MiOjQ6e3M6MjoiSUQiO3M6MToiNyI7czoxMjoiZGlzcGxheV9uYW1lIjtzOjI3OiJbUGVuZGluZyBSZXZpc2lvbiBNb25pdG9yc10iO3M6ODoiZGVzY3JpcHQiO3M6NzE6IkFkbWluaXN0cmF0b3JzIC8gUHVibGlzaGVycyB0byBub3RpZnkgKGJ5IGRlZmF1bHQpIG9mIHBlbmRpbmcgcmV2aXNpb25zIjtzOjc6Im1ldGFfaWQiO3M6Mjg6InJ2X3BlbmRpbmdfcmV2X25vdGljZV9lZF9ucl8iO31pOjM7Tzo4OiJzdGRDbGFzcyI6NDp7czoyOiJJRCI7czoxOiI4IjtzOjEyOiJkaXNwbGF5X25hbWUiO3M6Mjk6IltTY2hlZHVsZWQgUmV2aXNpb24gTW9uaXRvcnNdIjtzOjg6ImRlc2NyaXB0IjtzOjc4OiJBZG1pbmlzdHJhdG9ycyAvIFB1Ymxpc2hlcnMgdG8gbm90aWZ5IHdoZW4gYW55IHNjaGVkdWxlZCByZXZpc2lvbiBpcyBwdWJsaXNoZWQiO3M6NzoibWV0YV9pZCI7czozMDoicnZfc2NoZWR1bGVkX3Jldl9ub3RpY2VfZWRfbnJfIjt9aTo0O086ODoic3RkQ2xhc3MiOjQ6e3M6MjoiSUQiO3M6MToiMSI7czoxMjoiZGlzcGxheV9uYW1lIjtzOjE4OiJbV1AgYWRtaW5pc3RyYXRvcl0iO3M6ODoiZGVzY3JpcHQiO3M6NTI6IkFsbCB1c2VycyB3aXRoIHRoZSBXb3JkUHJlc3MgYWRtaW5pc3RyYXRvciBibG9nIHJvbGUiO3M6NzoibWV0YV9pZCI7czoyMToid3Bfcm9sZV9hZG1pbmlzdHJhdG9yIjt9aTo1O086ODoic3RkQ2xhc3MiOjQ6e3M6MjoiSUQiO3M6MToiMyI7czoxMjoiZGlzcGxheV9uYW1lIjtzOjExOiJbV1AgYXV0aG9yXSI7czo4OiJkZXNjcmlwdCI7czo0NToiQWxsIHVzZXJzIHdpdGggdGhlIFdvcmRQcmVzcyBhdXRob3IgYmxvZyByb2xlIjtzOjc6Im1ldGFfaWQiO3M6MTQ6IndwX3JvbGVfYXV0aG9yIjt9aTo2O086ODoic3RkQ2xhc3MiOjQ6e3M6MjoiSUQiO3M6MToiNCI7czoxMjoiZGlzcGxheV9uYW1lIjtzOjE2OiJbV1AgY29udHJpYnV0b3JdIjtzOjg6ImRlc2NyaXB0IjtzOjUwOiJBbGwgdXNlcnMgd2l0aCB0aGUgV29yZFByZXNzIGNvbnRyaWJ1dG9yIGJsb2cgcm9sZSI7czo3OiJtZXRhX2lkIjtzOjE5OiJ3cF9yb2xlX2NvbnRyaWJ1dG9yIjt9aTo3O086ODoic3RkQ2xhc3MiOjQ6e3M6MjoiSUQiO3M6MToiMiI7czoxMjoiZGlzcGxheV9uYW1lIjtzOjExOiJbV1AgZWRpdG9yXSI7czo4OiJkZXNjcmlwdCI7czo0NToiQWxsIHVzZXJzIHdpdGggdGhlIFdvcmRQcmVzcyBlZGl0b3IgYmxvZyByb2xlIjtzOjc6Im1ldGFfaWQiO3M6MTQ6IndwX3JvbGVfZWRpdG9yIjt9aTo4O086ODoic3RkQ2xhc3MiOjQ6e3M6MjoiSUQiO3M6MToiNSI7czoxMjoiZGlzcGxheV9uYW1lIjtzOjE1OiJbV1Agc3Vic2NyaWJlcl0iO3M6ODoiZGVzY3JpcHQiO3M6NDk6IkFsbCB1c2VycyB3aXRoIHRoZSBXb3JkUHJlc3Mgc3Vic2NyaWJlciBibG9nIHJvbGUiO3M6NzoibWV0YV9pZCI7czoxODoid3Bfcm9sZV9zdWJzY3JpYmVyIjt9fX0=*/
?>