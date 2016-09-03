# rose-content-expiration
A little WordPress shortcode plugin I wrote for personal use to set start/end dates for promotional content or time-sensitive alerts.

This shortcode allows you to schedule temporary content within your posts, pages, and custom post types. Set start/end dates for promotional content or time-sensitive alerts. 

- Schedule future content or set expirations for content (or both).
- Uses PHP's `strtotime()` for attributes `start` and `end`.
- Supports shortcodes within the `temp` shortcode.
- Functions are pluggable.
