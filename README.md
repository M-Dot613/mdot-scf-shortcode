# M-Dot ACF Shortcode Plugin

**Contributors:** M-Dot
**Tags:** ACF, Advanced Custom Fields, Shortcode  
**Requires PHP:** 7.4 or higher  
**Tested up to:** WordPress 6.x  
**Stable tag:** 1.1  
**License:** GPLv2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

## Description

The **M-Dot ACF Shortcode Plugin** provides a simple way to use Advanced Custom Fields (ACF) values directly within your posts, pages, or custom post types via a WordPress shortcode. With this plugin, you can retrieve ACF field values using the `[mdot_scf]` shortcode.

---

## Features

- Supports ACF field retrieval using `get_field()`.
- Fully customizable shortcode attributes.
- Compatible with ACF version 6.2.6+ (supports `$escape_html` parameter).
- Flexible and user-friendly.

---

## Shortcode Usage

The shortcode is `[mdot_scf]`. Below are the attributes you can use:

| Attribute     | Description                                                                                  | Default   |
|---------------|----------------------------------------------------------------------------------------------|-----------|
| `name`        | The ACF field name or key. **Required.**                                                     | N/A       |
| `post`        | The post ID to fetch the field from. Defaults to the current post.                           | `false`   |
| `format`      | Whether to apply ACF formatting logic to the field value.                                    | `true`    |
| `eschtml`     | Whether to escape HTML output. Requires ACF version 6.2.6+.                                  | `false`   |

### Example Usage

```html
[mdot_scf name="field_name" post="123" format="true" eschtml="true"]
