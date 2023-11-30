CREATE TABLE `user` (
  `id` int(7) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `questions` (
  `qid` int(7) NOT NULL,
  `question` text NOT NULL,
  `qtype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `option` (
  `oid` int(7) NOT NULL,
  `qid` int(7) NOT NULL,
  `qoption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


CREATE TABLE `answers` (
  `aid` int(7) NOT NULL,
  `qid` int(7) NOT NULL,
  `oid` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

ALTER TABLE `questions`
  MODIFY `qid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`),
  ADD UNIQUE KEY `question` (`question`) USING HASH;

ALTER TABLE `option`
  MODIFY `oid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

ALTER TABLE `option`
  ADD CONSTRAINT `option_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`);
COMMIT

ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`,`qid`,`oid`),
  ADD KEY `oid` (`oid`),
  ADD KEY `qid` (`qid`);


ALTER TABLE `answers`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;


ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `option` (`oid`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`);
COMMIT;


INSERT INTO `questions` (`qid`, `question`, `qtype`) VALUES
(1, 'Which of the following is the correct syntax to add the header file in the C++ program?', 'c++'),
(2, 'Which of the following is the correct syntax to print the message in C++ language?', 'c++'),
(3, 'Which of the following is the correct identifier?', 'c++'),
(4, 'Which of the following is the address operator?', 'c++'),
(5, 'Which of the following features must be supported by any programming language to become a pure object-oriented programming language?', 'c++'),
(6, 'The programming language that has the ability to create new data types is called___.', 'c++'),
(7, 'Which of the following is the original creator of the C++ language?', 'c++'),
(8, 'Which of the following is the correct syntax to read the single character to console in the C++ language?', 'c++'),
(9, 'Which of the following statements is correct about the formal parameters in C++?', 'c++'),
(10, 'The C++ language is ______ object-oriented language.', 'c++'),
(11, ' Which data structure is used for implementing recursion?', 'dsa'),
(12, 'The data structure required to check whether an expression contains a balanced parenthesis is?', 'dsa'),
(13, ' Which data structure is needed to convert infix notation to postfix notation?', 'dsa'),
(14, ' What is the value of the postfix expression 6 3 2 4 + – *?', 'dsa'),
(15, 'What data structure would you mostly likely see in non recursive implementation of a recursive algorithm?', 'dsa'),
(16, 'The data structure required for Breadth First Traversal on a graph is?', 'dsa'),
(17, ' The prefix form of A-B/ (C * D ^ E) is?', 'dsa'),
(18, 'Which data structure is based on the Last In First Out (LIFO) principle?', 'dsa'),
(19, 'Which of the following tree data structures is not a balanced binary tree?', 'dsa'),
(20, 'Which of the following is not the type of queue?', 'dsa');


INSERT INTO `option` (`oid`, `qid`, `qoption`) VALUES
(1, 1, 'A) #include<userdefined>'),
(2, 1, 'B)  #include \"userdefined.h\"'),
(3, 1, 'C)  <include> \"userdefined.h\"'),
(4, 1, 'D)  Both A and B'),
(5, 2, 'cout <<\"Hello world!\";'),
(6, 2, 'Cout << Hello world! ;'),
(7, 2, 'Out <<\"Hello world!;'),
(8, 2, 'None of the above'),
(9, 3, '$var_name'),
(10, 3, 'VAR_123'),
(11, 3, 'varname@'),
(12, 3, 'None of the above'),
(13, 4, '@'),
(14, 4, '#'),
(15, 4, '&'),
(16, 4, '%'),
(17, 5, 'Encapsulation'),
(18, 5, 'Inheritance'),
(19, 5, 'Polymorphism'),
(20, 5, 'All of the above'),
(21, 6, 'Overloaded'),
(22, 6, 'Encapsulated'),
(23, 6, 'Reprehensible'),
(24, 6, 'Extensible'),
(25, 7, 'Dennis Ritchie'),
(26, 7, 'Ken Thompson'),
(27, 7, 'Bjarne Stroustrup'),
(28, 7, 'Brian Kernighan'),
(29, 8, 'Read ch()'),
(30, 8, 'Getline vh()'),
(31, 8, 'get(ch)'),
(32, 8, 'Scanf(ch)'),
(33, 9, 'Parameters with which functions are called'),
(34, 9, 'Parameters which are used in the definition of the'),
(35, 9, 'Variables other than passed parameters in a functi'),
(36, 9, 'Variables that are never used in the function'),
(37, 10, 'Pure Object oriented'),
(38, 10, 'Not Object oriented'),
(39, 10, 'Semi Object-oriented or Partial Object-oriented'),
(40, 10, 'None of the above'),
(41, 11, 'Stack'),
(42, 11, 'Queue'),
(43, 11, 'List'),
(44, 11, 'Array'),
(45, 12, 'Queue'),
(46, 12, 'Stack'),
(47, 12, 'Tree'),
(48, 12, 'Array'),
(49, 13, 'Tree'),
(50, 13, 'Branch'),
(51, 13, 'Stack'),
(52, 13, 'Queue'),
(53, 14, '74'),
(54, 14, '-18'),
(55, 14, '22'),
(56, 14, '40'),
(57, 15, 'Stack'),
(58, 15, ' Linked List'),
(59, 15, 'Tree'),
(60, 15, ' Queue'),
(61, 16, 'Array'),
(62, 16, 'Stack'),
(63, 16, 'Tree'),
(64, 16, 'Queue'),
(65, 17, '-A/B*C^DE'),
(66, 17, '-A/BC*^DE'),
(67, 17, '-ABCD*^DE'),
(68, 17, ' -/*^ACBDE'),
(69, 18, 'Tree'),
(70, 18, ' Linked List'),
(71, 18, ' Stack'),
(72, 18, 'Queue'),
(73, 19, 'Splay tree'),
(74, 19, 'B-tree'),
(75, 19, 'AVL tree'),
(76, 19, 'Red-black tree'),
(77, 20, 'Priority queue'),
(78, 20, 'Circular queue'),
(79, 20, 'Single ended queue'),
(80, 20, 'Ordinary queue');


INSERT INTO `answers` (`aid`, `qid`, `oid`) VALUES
(1, 1, 4),
(2, 2, 5),
(3, 3, 10),
(4, 4, 15),
(5, 5, 20),
(6, 6, 24),
(7, 7, 27),
(8, 8, 31),
(9, 9, 33),
(10, 10, 39),
(11, 11, 41),
(12, 12, 46),
(13, 13, 51),
(14, 14, 54),
(15, 15, 57),
(16, 16, 64),
(17, 17, 65),
(18, 18, 71),
(19, 19, 74),
(20, 20, 79);

