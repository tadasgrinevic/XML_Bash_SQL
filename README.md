# XML_Bash_SQL
This application is example of how to use xml loader and how to fetch data. It also includes * *.CSV* * file building.
This application can also be accessed by sending 2 agruments through [Bash script](docs/script.sh).

Two examples of reading XML:
- [XML Read from file](index.php)
- [XML Read from xml string](indexstring.php)

<br/><br/><br/><br/>
# SQL Query task
<img src="task.png" alt="Task"/>
<br/><br/>

**Right answer:**
Click [here](phpmyadmin-persons.png") to see image of correct SQL Query response in PhpMyAdmin<br/> or open spoiler below to see SQL Query code.

<details>
  <summary>Correct Answer (SQL Query)</summary>
  
```SELECT (SELECT products.Title FROM products WHERE products.id = product_variants.product_id) AS title, colour, (SELECT GROUP_CONCAT(size SEPARATOR '|')) AS size FROM product_variants GROUP BY colour, title ORDER BY title, size, colour```

</details>
