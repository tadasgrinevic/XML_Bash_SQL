# XML_Bash_SQL
This application is example of how to use **xml loader** with or without **XPath** and how to fetch data. It also includes *.CSV* file building.
This application can also be accessed by sending 2 agruments through [Bash script](script.sh).

3 examples of reading XML:
- [XML Read from file with XPath](index.php)
- [XML Read from file without using XPath](index.php)
- [XML Read from xml string](indexstring.php)

<br/><br/>
# SQL Query task
<img src="task.png" alt="Task"/>
<br/><br/>

**Right answer:**
Click [here](phpmyadmin-persons.png) to see image of correct SQL Query response in PhpMyAdmin<br/> or open spoiler below just for code

<details>
  <summary>Correct Answer (SQL Query)</summary>
  
```SELECT products.Title, product_variants.colour, GROUP_CONCAT(product_variants.size SEPARATOR '|') as size FROM product_variants INNER JOIN products ON products.id = product_variants.product_id GROUP BY colour, title ORDER BY title, size ASC```

</details>
