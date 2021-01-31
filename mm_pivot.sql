-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 07:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mm_pivot`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `excert` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `blog_category_id`, `excert`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ပြင်ဦးလွင်မှ မြန်မာ့ မဏ္ဍိုင် KIA Car Showroom', '<p>လူကြီးမင်းများအားလုံးကို ပြင်ဦးလွင်မြို့ သီရီ မင်္ဂလာလမ်း ရှိ (Location&nbsp;<a href=\"https://goo.gl/maps/UukeiUW7UoJpNb47A\">https://her.is/36LthFB</a>&nbsp;) မှာတည်ရှိသည့် မြန်မာ့မဏ္ဍိုင် Car Showroom လေးနဲ့ မိတ်ဆက်ပေးချင်ပါတယ်။ Myanma Pivot KIA car showroom တွင်ရောင်းချပေးနေတဲ့ KIA ကားတွေဟာဆိုရင်နိုင်ငံ တကာစံချိန်စံညွှန်းများအတိုင်း တောင်ကိုရီးယားနိုင်ငံမှ တင်သွင်းထားပြီး Design ပိုင်း Safety ပိုင်းတွေမှာ ဆုတံဆိပ် များစွာပိုင်ဆိုင်ထားပါသည်။ အမြင့်မားဆုံးသော စွမ်းဆောင်မှု၊ သက်တောင့်သက်သာရှိမှု၊ လျှင်မြန်သွက်လက်မှု ၊ ကြွားဝါစေသော Design နှင့် အမြင့်ဆုံးကာကွယ်မှုတွေကို ပေးစွမ်းနိုင်မှာပါ။<br />\r\nကြွားဝါသော Body design အသွင်အပြင် ၊ နောက်ဆုံးပေါ်နည်းပညာ<br />\r\nတို့ပေါင်းဆပ်ထားပြီး ခေတ်မှီလွန်းသည့် Option များက ကားအများကြားတွင် ထွန်းတောက်ပေါ်လွင်နေမည်မှာ အမှန်ပင်ဖြစ်ပါသည်။</p>\r\n\r\n<p>KIA brand ကားများဟာ International မှ ဆုတံဆိပ်များရရှိထားသော ယုံကြည်စိတ်ချရ သော Brand ဖြစ်ပါသည်။&nbsp;<a href=\"https://www.jdpower.com/cars/ratings/kia/2019\">https://www.jdpower.com/cars/ratings/kia/2019</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>https://youtu.be/CEpngrm2RK4</p>\r\n\r\n<p>ထို့အပြင် KIA တံဆိပ်နှင့် လူကြီး မင်းတိုစိတ်ကြိုက်ရွေးချယ်နိုင်ရန် KIA Rio, KIA Sportage, KIA Pi-canto, KIA Sorento နှင့် KIA optima စသည့် ဒီဇိုင်းစုံ model အရောင်အသွေးစုံလင်သော KIAတံဆိပ် ကားများရွေးချယ်ဝယ်ယူနိုင်ပါတယ်။ နောက်ဆုံးအနေဖြင့် KIA Sportage GT line, KIA Sorento GTline, KIA Optima GTline စသည့်တို့ကို လည်း ရွေးချယ်ဝယ်ယူနိုင်ကြောင်း သတင်းကောင်းပါး အပ်ပါသည်။ အသေးစိတ်သိရှိလိုပါက&nbsp;<a href=\"http://www.sssmotors.com/\">www.sssmotors.com</a>&nbsp;တွင်ဝင်ရောက်လေ့လာကြည့်ရှုနိုင်ပါသည်။</p>', 1, 'လူကြီးမင်းများအားလုံးကို ပြင်ဦးလွင်မြို့ သီရီ မင်္ဂလာလမ်း ရှိ (Location&nbsp;https://her.is/36LthFB&nbsp;...', 'KIA-Car-Showroom', '2021-01-26 23:20:20', '2021-01-26 23:20:20'),
(2, 'Everyone can own KIA just with rental fees.', '<p>Payment အစီအစဉ်အနေဖြင့် လူကြီးမင်းတို့ စိတ်ကြိုက်ပုံစံမျိုးစုံ ဖြင့် မိမိနှင့် ကိုက်ညီမည့် ပုံစံကို ၀၉၄၃၀၁၇၀၀၇ သို့ သိလိုသမျှအကြောင်းအရာများကို မေးမြန်းစုံစမ်း ရွေးချယ်ဝယ်ယူနိုင် ကြောင်း အသိပေးအပ်ပါသည်။ အသေးစိတ်ကို<a href=\"https://m.facebook.com/story.php?story_fbid=3210950118932094&amp;id=2608675969159515\">https://m.facebook.com/story</a></p>\r\n\r\n<p>Service အတွက် အကောင်းဆုံးဝန်ဆောင်မှု အပြည့်ပေးနေပါကြောင်း နှင့် Spare part များကိုလည်း အမြန်ဆုံးရရန် ဝန်ဆောင်မှုပေးနေကြောင်း အသိပေးအပ်ပါတယ်။</p>\r\n\r\n<p>promotion၊ payment နှင့် အတိုးနှုန်းများကိုလည်း အချိန်ကာလအလိုက် ပြောင်းလဲ၍ လက်ဆောင်ပစ္စည်းများပေးအပ်သည့်အပြင် အခြားအခြားသော စိတ်ဝင်စားဖွယ်ကောင်းသော promotion အစီအစဉ်များကိုလဲ ပြုလုပ်ပေးလျှက်ရှိကြောင်း အသိပေးအပ်ပါတယ်။ အသေးစိတ်အချက်လက်များ ကို&nbsp;<a href=\"http://m.me/mmpivotkia.pol\">m.me/mmpivotkia.pol</a>&nbsp;page သို့ like and follow လုပ်ခြင်းဖြင့် promotion update များကို စုံစမ်းသိရှိနိုင်ပါတယ်၊။</p>', 1, 'Payment အစီအစဉ်အနေဖြင့် လူကြီးမင်းတို့ စိတ်ကြိုက်ပုံစံမျိုးစုံ ဖြင့် မိမိနှင့် ကိုက်ညီမည့် ပုံစံကို ၀၉၄၃၀...', 'Everyone-can-own-KIA-just-with-rental-fees', '2021-01-26 23:21:51', '2021-01-26 23:21:51'),
(3, 'မြန်မာ့မဏ္ဍိုင် မှတာဝန်ယူဆောင်ရွက်ပေးနေသော Custom Clearance လုပ်ငန်းစဉ်များ', '<p>မင်္ဂလာပါ။ ကျွန်ုပ်တို့ မြန်မာ့မဏ္ဍိုင် ကုမ္ပဏီမှ ဆိပ်ကမ်းလိုအပ်ချက်အထွေထွေကို လူကြီးမင်း တို့ အချိန်ကုန် လူပင်ပန်း မဖြစ်စေရအောင် ဆောင်ရွက်ပေးရန် အသင့်ရှိနေပါပြီ။<br />\r\nကျွနု်ပ်တို့ ကုမ္ပဏီမှ&hellip;&hellip;..<br />\r\n ပစ္စည်းများတင်သွင်းရန် ကုမ္ပဏီစီစဉ်ပေးခြင်း၊ ( လိုအပ်ပါက သွင်းကုန်လိုင်စင်လျောက်ထားခြင်း)<br />\r\n ပစ္စည်းများရောက်ရှိပါက အကောက်ခွန် ရှင်းလင်းထုန်ယူပေးခြင်း၊<br />\r\n အကောက်ခွန် အယူခံ ကိစ္စရပ်များ<br />\r\nနောက်ထပ်ဝန်ဆောင်မှုများအနေဖြင့်<br />\r\n လူကွီးမငျးတို့အနဖွေငျ့ ဂိုဒေါငျဌားရမျးရနျ မလိုတေော့ပဲ တငျသှငျးရောကျရှိလာသော ပစ်စညျးမြားကို မိမိတို့ warehouse မြားတှငျ ထိမျးသိမျးပေးပွီး မွို့တှငျးဆိုငျရောကျနှငျ့ နယျကားဂိတျ အရောကျ Deliver လုပျပေးခွငျး။<br />\r\n လူကြီးမင်းတို့ ဝယ်ယူမည့်နိုင်ငံမှ Containerတင်ပေးခြင်း၊ ( Ex-Work) သဘောၤလိုင်း ချိတ်ဆက်ပေးခြင်း၊ လေဆိပ်နှင့် နယ်စပ်ပေးပို့လိုသော ပစ္စည်းများအတွက် လိုအပ်သော ဝန်ဆောင်မှုများ ပြုလုပ်ပေးခြင်း၊<br />\r\nအထက်ပါဝန်ဆောင်မှုများကို မည်သူနှင့်မှ မတူသောဝန်ဆောင်မှုဖြင့် ထိထိရောက်ရောက် ဆောင်ရွက်ပေးပါမည်။<br />\r\nAdvantages<br />\r\n ဝန်ထမ်းစရိတ်များ လျော့ကျလာမည်။<br />\r\n Warehouse ဌါးရမ်းခများ လျော့ကျလာမည်။<br />\r\n Admin expense များ လျော့ကျလာမည်။<br />\r\n မမျှော်မှန်းနိုင်သော ပြဿများ မရင်ဆိုင်ရေတော့ပါ။<br />\r\n ပစ္စည်း Damage မရှိတော့ပါ။<br />\r\n ပစ္စည်း Loss မရှိတော့ပါ။<br />\r\n ပစ္စည်း အဝင်/အထွက်စာရင်း မကိုက်ညီမှုမရှိတော့ပါ။<br />\r\n သင်သည် Unit expense detail တွက်ထားလျှင် နှိုင်းယှဉ်နိုင်ပါမည်။<br />\r\nIt is for sure, our services fees are less than what you have spent on those processes.<br />\r\n&ldquo;YOU JUST BUY AND SELL, THE REST, REST ON US&rdquo;</p>', 2, 'မင်္ဂလာပါ။ ကျွန်ုပ်တို့ မြန်မာ့မဏ္ဍိုင် ကုမ္ပဏီမှ ဆိပ်ကမ်းလိုအပ်ချက်အထွေထွေကို လူကြီးမင်း တို့ အချိန်ကုန်...', 'Custom-Clearance', '2021-01-26 23:22:59', '2021-01-26 23:22:59'),
(4, 'မြန်မာ့မဏ္ဍိုင် ကုမ္ပဏီ မှတာဝန်ယူဆောင်ရွက်ပေးနေသော License လုပ်ငန်းများ', '<p>မင်္ဂလာပါ။</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ကျွန်တော်တို့ မြန်မာ့မဏ္ဍိုင် ကုမ္ပဏီမှ လူကြီးမင်းတို့လိုအပ်သည်များကို အခက်အခဲမရှိစေရန်အတွက် ဝန်ဆောင်မှုပေးနေကြောင်း အကြောင်းကြားလိုက်ပါသည်။ ကျွန်တော်တို့ ဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းများမှာ&hellip;&hellip;..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>🌿&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Company တည်ထောင်ခြင်း၊ Company ပိတ်သိမ်းခြင်း နှင့် ဆက်စပ်လုပ်ငန်းများ အားလုံး ထုတ်ကုန်/&nbsp;&nbsp;&nbsp;&nbsp; သွင်းကုန် Registration ပြုလုပ်ခြင်း နှင့် ဆက်စပ်လုပ်ငန်းများ အားလုံး၊ UMFCCI နှင့် MIFFA ကဲ့သို့အခြား အသင်းများတွင် Member လုပ်ပေးခြင်း။</p>\r\n\r\n<p>🌿&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; သွင်းကုန်/ထုတ်ကုန် လုပ်ငန်းအတွက် လိုအပ်သော ထောက်ခံချက်များ လျှောက်ပေးခြင်း။</p>\r\n\r\n<p>🌿&nbsp;&nbsp;&nbsp;&nbsp; FDA (ကျန်းမားရေးဦးစီးဌာန) ၊ ဆက်သွယ်ရေး (ဖုန်းနှင့်တက်ပလက်အစရှိသည့်) ထောက်ခံချက်များ၊ တိုင်းရင်းဆေး၊ စက်မှု (၁) အပါအဝင် အခြား လိုအပ်သည့် ထောက်ခံချက်အားလုံး၊ မွေးမြူရေးနှင့် ကုသရေးဦးစီးဌာန ထောက်ခံချက်များ၊ ဌာနဆိုင်ရာအသီးသီးအတွက် လိုအပ်သော ဆည်မြောင်း ဝန်ကြီးဌာန ထောက်ခံချက်များ၊ ဌာနဆိုင်ရာအသီးသီး အတွက်လိုအပ်သော စာရွက်စာတမ်းများ လျှောက်ထားခြင်း။</p>\r\n\r\n<p>🌿 MIC ခွင့်ပြုမိန့်၊ အဆိုပြုလွှာတင်ခြင်း၊ အတည်ပြုမိန့်တင်ပြခြင်း၊ MIC နှင့်ပက်သတ်သော ရုံးလုပ်ငန်းကိစ္စအဝဝ။</p>\r\n\r\n<p>🌿 သွင်းကုန်လိုင်စင် လျှောက်ထားခြင်း၊ Transit Trade လိုင်စင်လျှောက်ထားခြင်း၊ Export လိုင်စင်လျှောက်ထားခြင်း၊ လိုင်စင် Amendment လျှောက်ထားခြင်း၊ လိုင်စင်သက်တမ်းတိုး၊ လိုင်စင် ပြင်ဆင်ပိတ်သိမ်းပြုလုပ်ခြင်း၊ လိုင်စင်အပ်နှံခြင်း။</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;အထက်ပါ လုပ်ငန်းစဉ်အားလုံးကို သက်သာကောင်းမွန်သော ဝန်ဆောင်မူများဖြင့် ထိထိရောက်ရောက် ဈေးနှုန်းသက်သာစွာ ဆောင်ရွက်ပေးနေပါသည်။</p>', 2, 'မင်္ဂလာပါ။&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ကျွန်တော်တို့ မြန်မာ့မဏ္ဍိုင် ကုမ္...', 'License', '2021-01-26 23:23:52', '2021-01-26 23:23:52'),
(5, 'Electric Multifunction Cooker (SP-325A)', '<p>Specifications 1500W 220-240V 50/60Hz Capacity &ndash; 3L ချက်ပြုတ်ကြော်လှော်နိုင်ပြီး အိုးအတွင်းပိုင်းတွင် Non-stick ကိုအသုံးပြုထားသောကြောင့် ကပ်ခြင်း၊ တူးခြင်းမဖြစ်စေပါ။</p>\r\n\r\n<p>Body ကို Metal အထူဖြင့်ပြူလုပ်ထားပြီး Powder Coating ကြွေဆေး ကို အသုံးပြုထားပါ သည်။ အိုးအဖုံးကို အရည်အသွေးမြင့် အပူခံနိုင်သော ဖန်ဖြင့် ပြုလုပ်ထားပါသည်။ အပူလွန်ကဲပါက အလိုလျှောက်ဖြတ်တောက်ပေးသော Automatic cut &ndash; off စနစ်ပါ ရှိပါသည်။ အလွယ် တကူ ဖြုတ်တပ် ဆေးကြောနိုင်ပြီး အရွယ်အစားတူ အခြားအိုးများကိုပါ အသုံးပြုနိုင်ခြင်း၊ ချက် ပြုတ်ရာတွင် အပူရှိန်ကို လိုအပ်သလို ထိန်းညှိနိုင်သော စနစ်ပါရှိခြင်းတို့ကြောင့် သုံးရအဆင်ပြေသည့် အရည်အသွေးမြင့် ဟင်းချက်အိုးဖြစ်ပါသည်။</p>', 3, 'Specifications 1500W 220-240V 50/60Hz Capacity &ndash; 3L ချက်ပြုတ်ကြော်လှော်နိုင်ပြီး အိုးအတွင်းပိုင်းတွ...', 'Electric-Multifunction-Cooker-SP-325A', '2021-01-26 23:25:22', '2021-01-26 23:25:22'),
(6, 'Convection Oven (CO-703A)', '<p>Specifications 1300W 220-240V 50/60Hz Capacity &ndash; 12L အသား/ငါးများအား ကင်ခြင်း၊ ဟင်းနွေးခြင်း၊ ပေါင်းခြင်းတို့နှင့်ပတ်သတ်၍ မိမိနှစ်သက်ရာကို လွယ်ကူစွာပြုလုပ်နိုင်သော 12 Ltr ဆံ့အိုးဖြစ်သည်။ ချက်နေစဉ် မီးခိုးငွေ့ထွက်ခြင်း၊ ဆီပေါက်ခြင်း မရှိသည့်အပြင် အရည် အသွေးမြင့် အပူခံဖန်အိုးဖြစ်သောကြောင့် အပူချိန်ကိုလိုသလို အနိမ့်အမြင့် ပြုလုပ်နိုင်သည်။ Fan စနစ်ပါရှိပြီး အပူချိန်ကို ညီညွတ်ပျံ့နှံ့စေခြင်း၊ Timmer စနစ်ပါရှိသဖြင့် မိနစ် ၆၀ အတွင်း လိုသလို ချိန်ညှိအသုံးပြုနိုင်ခြင်းတို့ကြောင့် လွယ်ကူရိုးရှင်းပြီး အရည်အသွေးမြင့် Convection Oven ဖြစ်သည်။</p>', 3, 'Specifications 1300W 220-240V 50/60Hz Capacity &ndash; 12L အသား/ငါးများအား ကင်ခြင်း၊ ဟင်းနွေးခြင်း၊ ပေါင်...', 'Convection-Oven-CO-703A', '2021-01-26 23:26:06', '2021-01-26 23:26:06'),
(7, 'မြန်မာ့မဏ္ဍိုင် ကုမ္ပဏီ မှ ထုတ်လုပ်လျက်ရှိသော Furniture & Home Decoration ပစ္စည်းများ', '<p>အားလုံးပဲ မင်္ဂလာပါ။</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; လူကြီးမင်းအားလုံးကို အမှတ် (၅၀၄)/(၅၀၆) ၊ ၄ လွှာ , ကုန်သည်လမ်းထောင့်နှင့် ၃၉ လမ်း၊ ကျောက်တံတာမြို့နယ်၊ ရန်ကုန်မြို့ ( Map-&nbsp;<a href=\"https://goo.gl/maps/7ig5pcZ1WaryCEdW7\">https://goo.gl/maps/7ig5pcZ1WaryCEdW7</a>&nbsp;)တွင်တည်ရှိသော &nbsp;မြန်မာ့မဏ္ဍိုင် ကုမ္ပဏီ၏ Manufacturing မှ တင်သွင်းရောင်းချလျက်ရှိသည့် Home Decoration Accessories များနှင့် မိတ်ဆက်ပေးချင်ပါတယ်။</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; လူကြီးမင်းတို့ အိမ် Decoration လုပ်ရာတွင်မပါမဖြစ်လိုအပ်သည့် Kitchen Cabinet, Door, Table, Sofa Setting အပြင်အခြားခြားသော home decoration accessories များကို ခေတ်မှီ CNC စက်ကြီးများဖြင့် ပုံဖော်ကာ ကျွမ်းကျင်ပညာရှင်များနှင့် ပူပေါင်း၍ တစ်မူထူးခြားသော အပြင်အဆင်များ နှင့် အရည်အသွေးကောင်းမွန်မှုတို့ကြောင်း လူကြီးမင်းတို့ အိမ်&zwnj;ဆောက်ပစ္စည်းရွေးချယ်ရန် ပထမဦးစားပေးအနေနှင့် စဥ◌်းစားသင့်ပါတယ်နော်&hellip;&hellip;&hellip;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>နောက်ပြီး လူကြီးမင်းတို့ ကိုယ်ပိုင် စိတ်ကြိုက် ဒီဇိုင်း များကိုလဲ အော်ဒါလက်ခံကြောင်းကိုပါ ထပ်မံသတင်းကောင်းပါ အသိပေးလိုက်ပါတယ်။&hellip;&hellip;..</p>\r\n\r\n<p><strong>ကျွန်ုပ်တို့ စက်ရုံရှိ လက်တ လောရရှိနိုင်သော ဒီဇိုင်းများကတော့&hellip;&hellip;&hellip;.</strong></p>', 4, 'အားလုံးပဲ မင်္ဂလာပါ။&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; လူကြီးမင်းအားလုံးကို အမှတ် (၅၀၄)/(၅၀...', 'Furniture-Home-Decoration', '2021-01-26 23:28:45', '2021-01-26 23:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Construction', '2021-01-26 22:47:53', '2021-01-26 22:47:53'),
(2, 'General Services', '2021-01-26 22:48:11', '2021-01-26 22:48:11'),
(3, 'Trading', '2021-01-26 22:48:19', '2021-01-26 22:48:19'),
(4, 'Manufacturing', '2021-01-26 22:48:26', '2021-01-26 22:48:26'),
(5, 'Logistic', '2021-01-26 22:48:33', '2021-01-26 22:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_photos`
--

CREATE TABLE `blog_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `patch` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_photos`
--

INSERT INTO `blog_photos` (`id`, `blog_id`, `patch`, `created_at`, `updated_at`) VALUES
(1, 1, '6010ff1cade22_blog.jpg', '2021-01-26 23:20:20', '2021-01-26 23:20:20'),
(2, 1, '6010ff1cc16c7_blog.jpg', '2021-01-26 23:20:20', '2021-01-26 23:20:20'),
(3, 1, '6010ff1cd3291_blog.jpg', '2021-01-26 23:20:20', '2021-01-26 23:20:20'),
(4, 2, '6010ff7750ad5_blog.png', '2021-01-26 23:21:51', '2021-01-26 23:21:51'),
(5, 2, '6010ff7767ad9_blog.jpg', '2021-01-26 23:21:51', '2021-01-26 23:21:51'),
(6, 2, '6010ff7773adf_blog.jpg', '2021-01-26 23:21:51', '2021-01-26 23:21:51'),
(7, 3, '6010ffbb15772_blog.jpg', '2021-01-26 23:22:59', '2021-01-26 23:22:59'),
(8, 3, '6010ffbb2a938_blog.jpg', '2021-01-26 23:22:59', '2021-01-26 23:22:59'),
(9, 3, '6010ffbb3db04_blog.jpg', '2021-01-26 23:22:59', '2021-01-26 23:22:59'),
(10, 4, '6010fff08b002_blog.jpeg', '2021-01-26 23:23:52', '2021-01-26 23:23:52'),
(11, 4, '6010fff096897_blog.jpg', '2021-01-26 23:23:52', '2021-01-26 23:23:52'),
(12, 5, '6011004a7b1b9_blog.jpg', '2021-01-26 23:25:22', '2021-01-26 23:25:22'),
(13, 5, '6011004a931c3_blog.png', '2021-01-26 23:25:22', '2021-01-26 23:25:22'),
(14, 5, '6011004aa836f_blog.jpg', '2021-01-26 23:25:22', '2021-01-26 23:25:22'),
(15, 6, '6011007657410_blog.jpg', '2021-01-26 23:26:06', '2021-01-26 23:26:06'),
(16, 6, '6011007660188_blog.jpg', '2021-01-26 23:26:06', '2021-01-26 23:26:06'),
(17, 6, '601100767624a_blog.png', '2021-01-26 23:26:06', '2021-01-26 23:26:06'),
(18, 7, '60110115ed620_blog.jpg', '2021-01-26 23:28:46', '2021-01-26 23:28:46'),
(19, 7, '60110116097aa_blog.png', '2021-01-26 23:28:46', '2021-01-26 23:28:46'),
(20, 7, '601101161eeb6_blog.jpg', '2021-01-26 23:28:46', '2021-01-26 23:28:46'),
(21, 7, '601101162d906_blog.jpg', '2021-01-26 23:28:46', '2021-01-26 23:28:46'),
(22, 7, '6011011637189_blog.jpg', '2021-01-26 23:28:46', '2021-01-26 23:28:46'),
(23, 7, '6011011643cbc_blog.png', '2021-01-26 23:28:46', '2021-01-26 23:28:46'),
(24, 7, '6011011657d51_blog.png', '2021-01-26 23:28:46', '2021-01-26 23:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `who` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `group`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Construction', 'Building Decoration', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:30:52', '2021-01-26 23:30:52'),
(2, 'Construction', 'Building Construction', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:34:48', '2021-01-26 23:34:48'),
(3, 'General Services', 'Food one', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:36:41', '2021-01-26 23:36:41'),
(4, 'General Services', 'Food two', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:37:00', '2021-01-26 23:37:00'),
(5, 'General Services', 'Food three', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:37:20', '2021-01-26 23:37:20'),
(6, 'General Services', 'Food four', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:37:52', '2021-01-26 23:37:52'),
(7, 'Trading', 'မုန့်ဖုတ်စက်', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:39:18', '2021-01-26 23:39:18'),
(8, 'Trading', 'ဖျော်စက်', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:39:37', '2021-01-26 23:39:37'),
(9, 'Trading', 'ဖျော်စက်အစုံပလုံ', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:40:10', '2021-01-26 23:40:10'),
(10, 'Trading', 'ဟင်းချက်အိုးအစုံ', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:40:32', '2021-01-26 23:40:32'),
(11, 'Manufacturing', 'ကြွေပြားအခင်း(၁)', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:41:55', '2021-01-26 23:41:55'),
(12, 'Manufacturing', 'မီးဖိုချောင်', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:42:15', '2021-01-26 23:42:15'),
(13, 'Manufacturing', 'ဘီဒို', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', '2021-01-26 23:42:30', '2021-01-26 23:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `patch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` (`id`, `gallery_id`, `patch`, `created_at`, `updated_at`) VALUES
(1, 1, '60110194c0062_gallery.jpg', '2021-01-26 23:30:52', '2021-01-26 23:30:52'),
(2, 1, '60110194d2daf_gallery.jpg', '2021-01-26 23:30:52', '2021-01-26 23:30:52'),
(3, 1, '60110194e3cdf_gallery.jpg', '2021-01-26 23:30:53', '2021-01-26 23:30:53'),
(4, 2, '6011028071583_gallery.jpg', '2021-01-26 23:34:48', '2021-01-26 23:34:48'),
(5, 2, '6011028084201_gallery.jpg', '2021-01-26 23:34:48', '2021-01-26 23:34:48'),
(6, 2, '601102809628a_gallery.jpg', '2021-01-26 23:34:48', '2021-01-26 23:34:48'),
(7, 3, '601102f102cb6_gallery.jpg', '2021-01-26 23:36:41', '2021-01-26 23:36:41'),
(8, 3, '601102f112b91_gallery.jpg', '2021-01-26 23:36:41', '2021-01-26 23:36:41'),
(9, 3, '601102f1211f4_gallery.jpg', '2021-01-26 23:36:41', '2021-01-26 23:36:41'),
(10, 4, '601103049eca9_gallery.jpg', '2021-01-26 23:37:00', '2021-01-26 23:37:00'),
(11, 5, '6011031833fc9_gallery.jpg', '2021-01-26 23:37:20', '2021-01-26 23:37:20'),
(12, 6, '60110338e2929_gallery.jpg', '2021-01-26 23:37:52', '2021-01-26 23:37:52'),
(13, 6, '60110338ef528_gallery.jpg', '2021-01-26 23:37:53', '2021-01-26 23:37:53'),
(14, 7, '6011038e92d58_gallery.jpg', '2021-01-26 23:39:18', '2021-01-26 23:39:18'),
(15, 8, '601103a1bf10a_gallery.jpg', '2021-01-26 23:39:37', '2021-01-26 23:39:37'),
(16, 9, '601103c24402d_gallery.jpg', '2021-01-26 23:40:10', '2021-01-26 23:40:10'),
(17, 10, '601103d818c04_gallery.jpg', '2021-01-26 23:40:32', '2021-01-26 23:40:32'),
(18, 11, '6011042b07b5f_gallery.jpg', '2021-01-26 23:41:55', '2021-01-26 23:41:55'),
(19, 12, '6011043f79397_gallery.jpg', '2021-01-26 23:42:15', '2021-01-26 23:42:15'),
(20, 13, '6011044e84cf8_gallery.jpg', '2021-01-26 23:42:30', '2021-01-26 23:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_01_26_051318_create_blog_categories_table', 1),
(4, '2021_01_26_053950_create_blogs_table', 1),
(5, '2021_01_26_081242_create_blog_photos_table', 1),
(6, '2021_01_26_090020_create_product_categories_table', 1),
(7, '2021_01_26_091457_create_products_table', 1),
(8, '2021_01_26_092411_create_product_photos_table', 1),
(9, '2021_01_26_121055_create_galleries_table', 1),
(10, '2021_01_26_203639_create_gallery_photos_table', 1),
(11, '2021_01_26_210209_create_contacts_table', 1),
(12, '2021_01_26_211509_create_teams_table', 1),
(13, '2021_01_26_221640_create_partners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `photo`, `link`, `created_at`, `updated_at`) VALUES
(1, 'All Win', '60110553aa4d4_partner.png', 'https://www.facebook.com/theingi.soe.5', '2021-01-26 23:46:51', '2021-01-26 23:46:51'),
(2, 'Alma Aung Family', '6011056f23a42_partner.png', 'https://www.facebook.com/theingi.soe.5', '2021-01-26 23:47:19', '2021-01-26 23:47:19'),
(3, 'GTT', '60110582400b3_partner.png', 'https://www.facebook.com/theingi.soe.5', '2021-01-26 23:47:38', '2021-01-26 23:47:38'),
(4, 'WONE', '60110594ef393_partner.png', 'https://www.facebook.com/theingi.soe.5', '2021-01-26 23:47:57', '2021-01-26 23:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `product_category_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'မီးဖိုချောင်ဒီဇိုင်း(၁)', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', 300000, 3, '6011062d8fc83_product.jpg', '2021-01-26 23:50:29', '2021-01-26 23:50:29'),
(2, 'မီးဖိုချောင်ဒီဇိုင်း(၂)', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', 300000, 3, '6011064fed782_product.jpg', '2021-01-26 23:51:04', '2021-01-26 23:51:04'),
(3, 'ကြွေပြားဒီဇိုင်း', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', 340000, 2, '60110683b1290_product.jpg', '2021-01-26 23:51:55', '2021-01-26 23:51:55'),
(4, 'မုန့်ဖုတ်စက်', 'To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.To help all as much as we can especially among all stakeholders without any bias and discriminations while going to our bunisess goal.', 390000, 1, '601106c127f8b_product.jpg', '2021-01-26 23:52:57', '2021-01-26 23:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'စားသောက်ကုန်ဆိုင်ရာ', '2021-01-26 23:48:27', '2021-01-26 23:48:27'),
(2, 'အဆောက်အဦးဆိုင်ရာ', '2021-01-26 23:48:34', '2021-01-26 23:48:53'),
(3, 'အပြင်အဆင်ဆိုင်ရာ', '2021-01-26 23:49:08', '2021-01-26 23:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_photos`
--

CREATE TABLE `product_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `patch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_photos`
--

INSERT INTO `product_photos` (`id`, `product_id`, `patch`, `created_at`, `updated_at`) VALUES
(1, 1, '6011062d9b2ab_product.jpg', '2021-01-26 23:50:29', '2021-01-26 23:50:29'),
(2, 1, '6011062da6cd2_product.jpg', '2021-01-26 23:50:29', '2021-01-26 23:50:29'),
(3, 1, '6011062db493d_product.jpg', '2021-01-26 23:50:29', '2021-01-26 23:50:29'),
(4, 2, '60110650031b1_product.jpg', '2021-01-26 23:51:04', '2021-01-26 23:51:04'),
(5, 2, '60110650108c9_product.jpg', '2021-01-26 23:51:04', '2021-01-26 23:51:04'),
(6, 2, '601106501f6b9_product.png', '2021-01-26 23:51:04', '2021-01-26 23:51:04'),
(7, 3, '60110683c8495_product.jpg', '2021-01-26 23:51:55', '2021-01-26 23:51:55'),
(8, 3, '60110683de52d_product.jpg', '2021-01-26 23:51:55', '2021-01-26 23:51:55'),
(9, 4, '601106c130fe0_product.jpg', '2021-01-26 23:52:57', '2021-01-26 23:52:57'),
(10, 4, '601106c13b0e2_product.jpg', '2021-01-26 23:52:57', '2021-01-26 23:52:57'),
(11, 4, '601106c143c0a_product.jpg', '2021-01-26 23:52:57', '2021-01-26 23:52:57'),
(12, 4, '601106c14c950_product.jpg', '2021-01-26 23:52:57', '2021-01-26 23:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `photo`, `position`, `facebook`, `google`, `twitter`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'Wynn Aung', '6010fdc4e74bc_team.jpg', 'Managing Director', 'https://www.facebook.com/wynnaung29573', 'https://www.facebook.com/wynnaung29573', 'https://www.facebook.com/wynnaung29573', 'https://www.facebook.com/wynnaung29573', '2021-01-26 23:14:37', '2021-01-26 23:14:37'),
(2, 'Thandar Soe', '601104d4b3547_team.jpg', 'Managing Director', 'https://m.facebook.com/thandar.soe.10441', 'https://m.facebook.com/thandar.soe.10441', 'https://m.facebook.com/thandar.soe.10441', NULL, '2021-01-26 23:44:44', '2021-01-26 23:44:44'),
(3, 'Theingi Soe', '60110523649ff_team.jpg', 'Deputy General Manager', 'https://www.facebook.com/theingi.soe.5', NULL, 'https://www.facebook.com/theingi.soe.5', NULL, '2021-01-26 23:46:03', '2021-01-26 23:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aung Htet Chon', 'admin@gmail.com', NULL, '$2y$10$ih6ZSSnm8IZyEHLZ6ywDqeLYbcGkEBMADXbCrDPOASzGNjMy1lvQa', NULL, NULL, '2021-01-26 22:47:15', '2021-01-26 22:47:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_photos`
--
ALTER TABLE `blog_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_photos`
--
ALTER TABLE `blog_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
