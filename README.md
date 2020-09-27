# XML_Bash_SQL

### SELECT (SELECT products.Title FROM products WHERE products.id = product_variants.product_id) AS title, colour, (SELECT GROUP_CONCAT(size SEPARATOR '|')) AS size FROM product_variants GROUP BY colour, title ORDER BY title, size, colour
