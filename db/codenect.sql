/*
 Navicat Premium Data Transfer

 Source Server         : Server 1
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : codenect

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 07/08/2019 12:06:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for game_progress
-- ----------------------------
DROP TABLE IF EXISTS `game_progress`;
CREATE TABLE `game_progress`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` int(255) NOT NULL,
  `gametime` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `game_difficulty` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `game_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `game_progress` decimal(65, 0) NOT NULL,
  `game_mistakes` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_id`(`student_id`) USING BTREE,
  CONSTRAINT `game_progress_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of game_progress
-- ----------------------------
INSERT INTO `game_progress` VALUES (46, 69, '0', 'c_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (47, 69, '549', 'c_intermediate', 'ongoing', 0, 12);
INSERT INTO `game_progress` VALUES (48, 69, '524', 'c_advance', 'ongoing', 0, 10);
INSERT INTO `game_progress` VALUES (49, 69, '0', 'java_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (50, 69, '126', 'java_intermediate', 'ongoing', 0, 2);
INSERT INTO `game_progress` VALUES (51, 69, '0', 'java_advance', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (52, 58, '23', 'c_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (53, 58, '1870', 'c_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (54, 58, '1322', 'c_advance', 'ongoing', 1, 3);
INSERT INTO `game_progress` VALUES (55, 58, '0', 'java_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (56, 58, '0', 'java_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (57, 58, '57', 'java_advance', 'ongoing', 1, 0);
INSERT INTO `game_progress` VALUES (58, 70, '0', 'c_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (59, 70, '0', 'c_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (60, 70, '0', 'c_advance', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (61, 70, '0', 'java_novice', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (62, 70, '0', 'java_intermediate', 'ongoing', 0, 0);
INSERT INTO `game_progress` VALUES (63, 70, '0', 'java_advance', 'ongoing', 0, 0);

-- ----------------------------
-- Table structure for problem_solve
-- ----------------------------
DROP TABLE IF EXISTS `problem_solve`;
CREATE TABLE `problem_solve`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` int(255) NOT NULL,
  `quiz_id` int(255) NOT NULL,
  `mapTile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `game_difficulty` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `quiz_id`(`quiz_id`) USING BTREE,
  INDEX `student_id`(`student_id`) USING BTREE,
  CONSTRAINT `problem_solve_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `problem_solve_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of problem_solve
-- ----------------------------
INSERT INTO `problem_solve` VALUES (17, 58, 33, '31', 'java_advance');

-- ----------------------------
-- Table structure for quiz
-- ----------------------------
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `problem` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `choice1` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `choice2` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `choice3` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `answer` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `trivia` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `subject` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `example` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `output` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `requirement` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hint` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of quiz
-- ----------------------------
INSERT INTO `quiz` VALUES (2, 'c_novice', 'Who invent C language?', 'Dennis Ritchie', 'John Doe', 'Bill Gates', 'Dennis Ritchie', 'C is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language. ', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (6, 'c_novice', 'What year C invented?', '1988', '1965', '1972', '1972', 'C is a general-purpose, procedural, imperative computer programming language developed in 1972 by Dennis M. Ritchie at the Bell Telephone Laboratories to develop the UNIX operating system. C is the most widely used computer language.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (9, 'c_intermediate', 'print Hello World;', NULL, NULL, NULL, 'Hello World', 'In C programming language, printf() function is used to print the “character, string, float, integer, octal and hexadecimal values” onto the output screen.\nWe use printf() function with %d format specifier to display the value of an integer variable.\nSimilarly %c is used to display character, %f for float variable, %s for string variable, %lf for double and %x for hexadecimal variable.\nTo generate a newline,we use “\\n” in C printf() statement.', 'printf();', ' #include &lt; stdio.h &gt; int main() {    char ch = \'A\';    char str[20] = \"fresh2refresh.com\";    float flt = 10.234;    int no = 150;    double dbl = 20.123456;    printf(\"Character is %c \\n\", ch);    printf(\"String is %s \\n\" , str);    printf(\"Float value is %f \\n\", flt);    printf(\"Integer value is %d\\n\" , no);    printf(\"Double value is %lf \\n\", dbl);    printf(\"Octal value is %o \\n\", no);    printf(\"Hexadecimal value is %x \\n\", no);    return 0; }', ' Character is A String is fresh2refresh.com Float value is 10.234000 Integer value is 150 Double value is 20.123456 Octal value is 226 Hexadecimal value is 96', 'printf', NULL);
INSERT INTO `quiz` VALUES (11, 'c_novice', 'In a C program, what is the use of the semicolon(', 'Identifier', 'A string literal', 'Statement terminator', 'Statement terminator', 'In a C program, the semicolon is a statement terminator. That is, each individual statement must be ended with a semicolon. It indicates the end of one logical entity.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (12, 'c_novice', 'It is a name used to identify a variable, function or any other user-defined item.', 'Comments', 'String', 'Identifier', 'Identifier', 'A C identifier is a name used to identify a variable, function, or any other user-defined item.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (13, 'c_novice', 'What is the term used in C to describe blanks, tabs, newline characters and comments?', 'Space', 'Whitespace', 'Blanks', 'Whitespace', 'Whitespace is the term used in C to describe blanks, tabs, newline characters and comments. Whitespace separates one part of a statement from another and enables the compiler to identify where one element in a statement, such as int, ends and the next element begins.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (14, 'c_novice', 'An extensive system used for declaring variables or function.', 'Constant', 'Loops', 'Data types', 'Data types', 'The type of a variable determines how much space it occupies in storage and how the bit pattern stored is interpreted.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (15, 'c_novice', 'A data type that specifies that no value is available.', 'Void type', 'Floating-point type', 'Data type', 'Void type', 'The void type specifies that no value is available.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (16, 'c_novice', 'It is a data type that can store numeric data.', 'Void types', 'Data types', 'Integer types', 'Integer types', 'Integer type can store numeric data.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (17, 'c_novice', 'It is a data type that represent non-integer number with a decimal point.', 'Void types', 'Floating-point types', 'Integer types', 'Floating-point types', 'Floating-point types represent non-integer number with a decimal point.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (18, 'c_novice', 'A name given to a storage area that programs can manipulate.', 'Variable', 'Operators', 'Functions', 'Variable', 'A variable is nothing but a name given to a storage area that our programs can manipulate. Each variable in C has a specific type, which determines the size and layout of the variable\'s memory; the range of values that can be stored within that memory; and the set of operations that can be applied to the variable.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (20, 'c_novice', 'In Arithmetic Operators, what is the description of ', 'Increment operator increases the integer value by one	', 'Decrement operator decreases the integer value by one', 'Modulus Operator and remainder of after an integer division', 'Modulus Operator and remainder of after an integer division', 'An operator is a symbol that tells the compiler to perform specific mathematical or logical functions.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (21, 'c_novice', 'What symbol in logical operators when both the operands are non-zero?', '||', '!', '&&', '&&', 'Logic operations include any operations that manipulate Boolean values.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (22, 'c_novice', 'What symbol in logical operators  used to reverse the logical state of its operand?', '||', '!', '%', '!', 'Called Logical NOT Operator. It is used to reverse the logical state of its operand. If a condition is true, then Logical NOT operator will make it false.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (23, 'c_novice', 'In Data types, what are the two(2) classifications of basic types?', 'Pointer types and Array types', 'Structure types and Pointer types', 'Integer types and Floating-point types', 'Integer types and Floating-point types', 'Basic types are arithmetic types.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (24, 'c_novice', 'A single-precision floating point value', 'double', 'int', 'float', 'float', 'Float is a term is used in various programming languages to define a variable with a fractional value. Numbers created using a float variable declaration will have digits on both sides of a decimal point. ', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (25, 'c_novice', 'Represents the absence of type', 'double', 'void', 'float', 'void', 'The Void type, in several programming languages derived from C and Algol68, is the type for the result of a function that returns normally, but does not provide a result value to its caller. Usually such functions are called for their side effects, such as performing some task or writing to their output parameters.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (26, 'c_novice', 'What is %s in C?', 'refers to a string', 'refers to an integer', 'refers to a character', 'refers to a string', '%s is used to format the output in C programming language. If we want to print a string, we use %s. It is called a format specifier.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (27, 'c_novice', 'A pre-processing directive used to include the contents of a file into your program.', 'Syntax', 'Bit', 'header file', 'header file', 'A header file is a file with extension .h which contains C function declarations and macro definitions to be shared between several source files. There are two types of header files: the files that the programmer writes and the files that comes with your compiler.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (28, 'c_novice', 'What is %d in C?', 'refers to a string', 'refers to an integer', 'refers to a character', 'refers to an integer', '%d is used to format the output in C programming language. If we want to print an integer, we use %d. It is called a format specifier.', NULL, NULL, NULL, '', NULL);
INSERT INTO `quiz` VALUES (29, 'c_advance', 'Create a function with a name of print_name() and print Hello World;', NULL, NULL, NULL, 'Hello World', 'A function is a group of statements that together perform a task. Every C program has at least one function, which is main(), and all the most trivial programs can define additional functions.', 'Function', '#include &lt; stdio.h &gt; <br> int main () { <br> names(); <br> } <br><br> names() { <br> printf(\"My Name is Harold\"); <br> }', 'My Name is Harold', 'print_name', 'function_name() {<br> //code here </br> }');
INSERT INTO `quiz` VALUES (33, 'java_advance', '', NULL, NULL, NULL, '', '', '', '', '', NULL, NULL);

-- ----------------------------
-- Table structure for teacher_students
-- ----------------------------
DROP TABLE IF EXISTS `teacher_students`;
CREATE TABLE `teacher_students`  (
  `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` int(255) NULL DEFAULT NULL,
  `student_id` int(255) NULL DEFAULT NULL,
  `timestamp` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teacher_students
-- ----------------------------
INSERT INTO `teacher_students` VALUES (7, 59, 58, NULL);
INSERT INTO `teacher_students` VALUES (9, 59, 70, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birthdate` varbinary(255) NULL DEFAULT NULL,
  `age` int(40) NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `school` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (58, '310354a8ec10e3115ffd8ce3b1a2bb1d.jpg', 'marwenvaleroso@gmail.com', 'student', 'Mreawn', 'Aspe', 'Valeroso', '12345', 0x332F382F31393938, 21, 'Male', 'FSUU', '2019-07-29 09:09:55.874861');
INSERT INTO `users` VALUES (59, '57bbda172cdb6700ad3ff80fa1e34b09.jpg', 'mreawnvlrsaeoo@gmail.com', 'teacher', 'mreawn', 'apse', 'vlrsaeoo', '12345', 0x313233, 21, 'male', 'FSUU', '2019-07-27 22:24:30.271517');
INSERT INTO `users` VALUES (60, NULL, 'admin@gmail.com', 'admin', 'admin', 'admin', 'admin', '12345', NULL, 21, 'male', NULL, '2019-07-10 09:44:16.265413');
INSERT INTO `users` VALUES (69, NULL, 'marwenvaleroso1@gmail.com', 'student', 'Marwen', 'Aspe', 'Valeroso', '12345', 0x4D6172636820382C2031393938, 21, 'Male', 'FSUU', '2019-07-22 09:50:55.526890');
INSERT INTO `users` VALUES (70, '6eb9f858e2c7dc57af14347fb3b43fd0.png', 'jhon@gmail.com', 'student', 'jhon', '', '', '12345', NULL, NULL, NULL, NULL, '2019-07-27 22:01:40.049562');

SET FOREIGN_KEY_CHECKS = 1;
