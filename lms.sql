-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 02:40 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `answer`, `description`, `image`) VALUES
(4, 2, 7, 'my answerrrr', 'the description', '4081r6jFYrC0500_360x.jpg'),
(6, 2, 7, 'i answer this question', 'llllllllll', '1646348644800_1_360x.jpg'),
(7, 2, 7, 'answer', 'lllllllllll', NULL),
(8, 1, 11, 'i answer this question', 'dddddd', NULL),
(9, 1, 11, 'ffff', 'kkk', NULL),
(10, 2, 8, 'answer', 'muujhuhuu', NULL),
(11, 2, 8, 'answer', 'ddddddddd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `description_en` longtext NOT NULL,
  `description_ar` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `image`) VALUES
(1, 'Why You Should Read Every Day', 'لماذا يجب أن تقرأ كل يوم؟', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.\r\n\r\nMany desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.\r\n\r\nIf you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.\r\n\r\nIt uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum” by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل عينة من كتاب.\r\n\r\nلقد صمد ليس فقط لخمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظل دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.\r\n\r\nهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. الهدف من استخدام لوريم إيبسوم هو أنه يحتوي على توزيع طبيعي -إلى حد ما- للأحرف ، بدلاً من استخدام \"هنا يوجد محتوى نصي ، هنا يوجد محتوى نصي\" ، مما يجعلها تبدو وكأنها إنجليزية سهلة القراءة.\r\n\r\nتستخدم العديد من حزم النشر المكتبي ومحرري صفحات الويب الآن Lorem Ipsum كنص نموذج افتراضي ، وسيكشف البحث عن \"lorem ipsum\" عن العديد من مواقع الويب التي لا تزال في مهدها. تطورت إصدارات مختلفة على مر السنين ، أحيانًا عن طريق الصدفة ، وأحيانًا عن قصد (روح الدعابة المحقونة وما شابه ذلك).\r\n\r\nهناك العديد من الأشكال المتاحة لنصوص لوريم إيبسوم ، ولكن الغالبية قد تعرضت للتغيير بشكل ما ، عن طريق إدخال الدعابة أو الكلمات العشوائية التي لا تبدو حتى قابلة للتصديق إلى حد ما.\r\n\r\nإذا كنت ستستخدم مقطعًا من لوريم إيبسوم ، فأنت بحاجة إلى التأكد من عدم وجود أي شيء محرج مخفي في منتصف النص. تميل جميع مولدات Lorem Ipsum على الإنترنت إلى تكرار الأجزاء المحددة مسبقًا حسب الضرورة ، مما يجعل هذا أول مولد حقيقي على الإنترنت.\r\n\r\nيستخدم قاموسًا يضم أكثر من 200 كلمة لاتينية ، جنبًا إلى جنب مع حفنة من تراكيب الجملة النموذجية ، لتوليد Lorem Ipsum الذي يبدو معقولًا. لذلك فإن Lorem Ipsum الذي تم إنشاؤه يكون دائمًا خاليًا من التكرار أو الدعابة المحقونة أو الكلمات غير المميزة وما إلى ذلك.\r\n\r\nالجزء القياسي من لوريم إيبسوم المستخدم منذ القرن الخامس عشر مستنسخ أدناه للمهتمين. تم أيضًا نسخ الأقسام 1.10.32 و 1.10.33 من \"de Finibus Bonorum et Malorum\" بواسطة Cicero في شكلها الأصلي بالضبط ، مصحوبة بنسخ إنجليزية من ترجمة عام 1914 بواسطة H. Rackham.', '982blog-7.jpg'),
(2, 'Online Learning Glossary', 'مسرد التعلم عبر الإنترنت', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.\r\n\r\nMany desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.\r\n\r\nIf you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.\r\n\r\nIt uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum” by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل عينة من كتاب.\r\n\r\nلقد صمد ليس فقط لخمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظل دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.\r\n\r\nهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. الهدف من استخدام لوريم إيبسوم هو أنه يحتوي على توزيع طبيعي -إلى حد ما- للأحرف ، بدلاً من استخدام \"هنا يوجد محتوى نصي ، هنا يوجد محتوى نصي\" ، مما يجعلها تبدو وكأنها إنجليزية سهلة القراءة.\r\n\r\nتستخدم العديد من حزم النشر المكتبي ومحرري صفحات الويب الآن Lorem Ipsum كنص نموذج افتراضي ، وسيكشف البحث عن \"lorem ipsum\" عن العديد من مواقع الويب التي لا تزال في مهدها. تطورت إصدارات مختلفة على مر السنين ، أحيانًا عن طريق الصدفة ، وأحيانًا عن قصد (روح الدعابة المحقونة وما شابه ذلك).\r\n\r\nهناك العديد من الأشكال المتاحة لنصوص لوريم إيبسوم ، ولكن الغالبية قد تعرضت للتغيير بشكل ما ، عن طريق إدخال الدعابة أو الكلمات العشوائية التي لا تبدو حتى قابلة للتصديق إلى حد ما.\r\n\r\nإذا كنت ستستخدم مقطعًا من لوريم إيبسوم ، فأنت بحاجة إلى التأكد من عدم وجود أي شيء محرج مخفي في منتصف النص. تميل جميع مولدات Lorem Ipsum على الإنترنت إلى تكرار الأجزاء المحددة مسبقًا حسب الضرورة ، مما يجعل هذا أول مولد حقيقي على الإنترنت.\r\n\r\nيستخدم قاموسًا يضم أكثر من 200 كلمة لاتينية ، جنبًا إلى جنب مع حفنة من تراكيب الجملة النموذجية ، لتوليد Lorem Ipsum الذي يبدو معقولًا. لذلك فإن Lorem Ipsum الذي تم إنشاؤه يكون دائمًا خاليًا من التكرار أو الدعابة المحقونة أو الكلمات غير المميزة وما إلى ذلك.\r\n\r\nالجزء القياسي من لوريم إيبسوم المستخدم منذ القرن الخامس عشر مستنسخ أدناه للمهتمين. تم أيضًا نسخ الأقسام 1.10.32 و 1.10.33 من \"de Finibus Bonorum et Malorum\" بواسطة Cicero في شكلها الأصلي بالضبط ، مصحوبة بنسخ إنجليزية من ترجمة عام 1914 بواسطة H. Rackham.', '11blog-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `course_id`) VALUES
(16, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `original_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `author`, `img`, `duration`, `price`, `original_price`) VALUES
(1, 'html', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.\r\n\r\nWeb browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for the appearance of the document.\r\n\r\nHTML elements are the building blocks of HTML pages. With HTML constructs, images and other objects such as interactive forms may be embedded into the rendered page. HTML provides a means to create structured documents by denoting structural semantics for text such as headings, paragraphs, lists, links, quotes and other items. HTML elements are delineated by tags, written using angle brackets', 'eng/Abdulrahman Alaa', '733course-10-400x300.jpg', '1 week', 0, 100),
(2, 'css', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.\r\n\r\nWeb browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for the appearance of the document.\r\n\r\nHTML elements are the building blocks of HTML pages. With HTML constructs, images and other objects such as interactive forms may be embedded into the rendered page. HTML provides a means to create structured documents by denoting structural semantics for text such as headings, paragraphs, lists, links, quotes and other items. HTML elements are delineated by tags, written using angle brackets', 'eng/Abdulrahman Alaa', '426course-9-400x300.jpg', '1.5 week', 0, 100),
(3, 'front-end web development', 'you will study HTML,CSS, JavavaScript, React js', 'eng/Abdulrahman Alaa', '522course-1-400x300.jpg', '3 months', 900, 500),
(4, 'full stack web development course', 'you will learn HTML,CSS,JavaScript,PHP,mySQL', 'eng/Abdulrahman Alaa', '733course-10-400x300.jpg', '4 months', 1000, 800),
(6, 'Backend web development course', 'you will study PHP,MYSQL', 'eng/Abdulrahman Alaa', '832bg_register_now.jpg', '1 months', 420, 500),
(7, 'zzzzzzzz', 'zzzzzzzzzz', 'zzzzzzzz', '980pexels-photo-691668.jpeg', '1 week', 2000, 2000),
(8, 'iiiiiiii', 'ggghghgljjjjj', 'ddff', '191486f2a03-2a9b-42ed-b938-e889c6dbf3ab.jpg', '1 week', 200, 100);

-- --------------------------------------------------------

--
-- Table structure for table `course_order`
--

CREATE TABLE `course_order` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_order`
--

INSERT INTO `course_order` (`id`, `course_id`, `stu_id`, `stu_email`, `order_date`) VALUES
(1, 1, 2, 'aisha@gmail.com', '2022-03-17 06:21:52'),
(2, 2, 2, 'aisha@gmail.com', '2022-04-15 09:31:14'),
(4, 2, 1, 'sara@gmail.com', '2022-04-16 01:40:38'),
(5, 1, 1, 'sara@gmail.com', '2022-04-17 02:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_id`, `course_id`, `content`) VALUES
(1, 1, 1, 'I really love the course editor in LearnPress. It is never easier when create'),
(2, 2, 1, 'LearnPress WordPress LMS Plugin designed with flexible & scalable eLearning system in mind. This WordPress eLearning Plugin comes up with 10+ addons (and counting) to extend the ability of this WordPress Learning Management System. This is incredible.'),
(3, 2, 3, 'nice course');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `lesson` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `description`, `lesson`, `course_id`) VALUES
(1, 'first Lec', 'html', '110YouCut_20220216_114401732.mp4', 1),
(7, 'css', 'css', '155المحاضرة الرابعه من كورس الفل ستاك _ الجزء الثاني من لغة الـ java script 😍.mp4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `description`, `image`) VALUES
(7, 1, 'js?', 'js', '259pexels-photo-169573.jpeg'),
(8, 1, 'كيف تتعلم برمجه', 'اريد ', '860pexels-photo-691668.jpeg'),
(11, 2, 'css?', 'deeeeeeeeee', NULL),
(12, 2, 'css?', 'اااااااااااا', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taskanswers`
--

CREATE TABLE `taskanswers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taskanswers`
--

INSERT INTO `taskanswers` (`id`, `question_id`, `is_correct`, `text`) VALUES
(1, 1, 1, 'Hyper Text Markup Language'),
(3, 2, 1, 'cascading style sheet'),
(4, 2, 0, 'case style sheet'),
(10, 1, 0, 'hyper text make language'),
(11, 10, 1, 'ghkkkkkkkkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `lesson_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `text`, `description`, `lesson_id`) VALUES
(1, 'what does HTML mean ?', '', 1),
(2, 'what does CSS mean?', '', 1),
(9, 'dddddddd', 'dddddddddd', 1),
(10, 'ghkkkkkkkkkkk', 'hhhhhhhh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role`) VALUES
(3, 'nada', 'nada@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '789shirts1-xcx1_360x.jpg', 'user'),
(4, 'sawsan', 'sawsan@gmail.com', '25d55ad283aa400af464c76d713c07ad', '699minimalist-img-10_360x (1).jpg', 'user'),
(5, 'gana', 'gana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '491264470005_1365222230567517_2952816515358979727_n.jpg', 'user'),
(7, 'dina', 'dina@gmail.com', '25d55ad283aa400af464c76d713c07ad', '261pexels-photo-691668.jpeg', 'user'),
(8, 'saraaaa', 'saratarek83@gmail.com', '25d55ad283aa400af464c76d713c07ad', '482brand-560312_ccddb4d5-152b-4396-b5fb-074088f9961b_360x.jpg', 'user'),
(14, 'saraaaa', 'aisha22222@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '88brand-560312_ccddb4d5-152b-4396-b5fb-074088f9961b_360x.jpg', 'user'),
(15, 'sara', 'sara11111111@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '211brand-560312_ccddb4d5-152b-4396-b5fb-074088f9961b_360x.jpg', 'user'),
(16, 'hgjhnnbnb', 'aisha7333333@gmail.com', '202cb962ac59075b964b07152d234b70', '692minimalist-img-10_360x.jpg', 'user'),
(17, 'Aisha_tarek111', 'sara33333333333@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '9246348644800_1_360x.jpg', 'user'),
(18, 'Aisha_tarek', 'nada1111111@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '7276348644800_1_360x.jpg', 'user'),
(19, 'saraaaa', 'sara1111111111111@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2306348644800_1_360x.jpg', 'user'),
(20, 'nadaaaaa', 'nada123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1876348644800_1_360x.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_order`
--
ALTER TABLE `course_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskanswers`
--
ALTER TABLE `taskanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_order`
--
ALTER TABLE `course_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `taskanswers`
--
ALTER TABLE `taskanswers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
