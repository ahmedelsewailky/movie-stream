<?php

namespace App\Http\Helpers;

class DataArray
{
    const DUBBED_STATUS = [
        '0' => 'اللغة الأصلية',
        '1' => 'مدبلج',
        '2' => 'مترجم',
    ];

    const TYPES = [
        '0' => 'دراما',
        '1' => 'اكشن',
        '2' => 'مغامرة',
        '3' => 'إثارة وتشويق',
        '4' => 'رعب',
        '5' => 'كوميدي',
        '6' => 'وثائقي',
    ];

    const LANGUAGES = [
        'عربي',
        'اجنبي',
        'صيني',
        'كوري',
        'هندي',
        'ياباني',
        'فرنسي',
        'ألماني',
        'برتغالي',
        'اسباني',
        'لاتيني'
    ];

    const COUNTRIES = [
        'Afghanistan' => 'أفغانستان',
        'Albania' => 'ألبانيا',
        'Algeria' => 'الجزائر',
        'Argentina' => 'الأرجنتين',
        'Australia' => 'أستراليا',
        'Bangladesh' => 'بنغلاديش',
        'Belgium	' => 'بلجيكا',
        'Bolivia	' => 'بوليفيا',
        'Botswana' => 'بوتسوانا',
        'Brazil	' => 'البرازيل',
        'Bulgaria' => 'بلغاريا',
        'Cambodia' => 'كمبوديا',
        'Cameroon' => 'الكاميرون',
        'Canada' => 'كندا',
        'China' => 'الصين',
        'Colombia' => 'كولومبيا',
        'Costa Rica' => 'كوستا ريكا',
        'Croatia	Croatian' => 'كرواتيا الكرواتية',
        'Cuba' => 'كوبا',
        'Denmark	' => 'الدنمارك',
        'Ecuador' => 'الاكوادور',
        'Egypt	' => 'مصر',
        'El Salvador' => 'السلفادور',
        'England	' => 'إنكلترا',
        'Ethiopia' => 'أثيوبيا',
        'Finland' => 'فنلندا',
        'France' => 'فرنسا',
        'Germany' => 'ألمانيا',
        'Ghana' => 'غانا',
        'Greece' => 'اليونان',
        'Iceland' => 'أيسلندا',
        'India' => 'الهند',
        'Indonesia' => 'إندونيسيا',
        'Iran' => 'إيران',
        'Iraq' => 'العراق',
        'Israel' => 'إسرائيل',
        'Italy' => 'إيطاليا',
        'Jamaica	' => 'جامايكا',
        'Japan' => 'اليابان',
        'Jordan	' => 'الأردن',
        'Kenya' => 'كينيا',
        'Kuwait	' => 'الكويت',
        'Lebanon' => 'لبنان',
        'Libya	' => 'ليبيا',
        'Madagascar	h' => 'مدغشقر ح',
        'Mali	' => 'مالي',
        'Malta	' => 'مالطا',
        'Mexico	' => 'المكسيك',
        'Mongolia	' => 'منغوليا',
        'Morocco	' => 'المغرب',
        'Mozambique	' => 'موزمبيق',
        'Namibia' => 'ناميبيا',
        'New Zealand	' => 'نيوزيلندا',
        'Nicaragua' => 'نيكاراغوا',
        'Pakistan' => 'باكستان',
        'Panama	' => 'بنما',
        'Paraguay	' => 'باراجواي',
        'Peru	' => 'بيرو',
        'Philippines	' => 'فيلبيني',
        'Poland' => 'بولندا',
        'Portugal' => 'البرتغال',
        'Romania	' => 'رومانيا',
        'Russia	' => 'روسيا',
        'Saudi Arabia' => 'المملكة العربية السعودية',
        'Scotland' => 'اسكتلندا',
        'Senegal	' => 'السنغال',
        'Serbia	' => 'صربيا',
        'Singapore' => 'سنغافورة',
        'Slovakia' => 'سلوفاكيا',
        'South Africa' => 'جنوب أفريقيا',
        'South Korea	' => 'كوريا الجنوبية',
        'Spain	' => 'إسبانيا',
        'Sri Lanka' => 'سيريلانكا',
        'Sudan' => 'السودان',
        'Syria' => 'سوريا',
        'Taiwan	' => 'تايوان',
        'Tajikistan	' => 'طاجيكستان',
        'Tunisia	' => 'تونس',
        'Turkey	' => 'ديك رومى',
        'Ukraine	' => 'أوكرانيا',
        'United Arab Emirates' => 'الإمارات العربية المتحدة',
        'United Kingdom' => 'المملكة المتحدة',
        'United States' => 'الولايات المتحدة',
        'Venezuela' => 'فنزويلا',
        'Vietnam' => 'فيتنام',
        'Zambia' => 'زامبيا',
        'Zimbabwe' => 'زيمبابوي',
    ];

    const QUALITIES = [
        'HQCAM',
        'SD',
        '2K',
        '4K',
        '8K',
        'BluRay',
        'BluRay 480p',
        'BluRay 720p',
        'BluRay 1080p',
        'BluRay 2160p',
        'HD',
        'HD 360p',
        'HD 480p',
        'HD 720p',
        'HD 1080p',
        'HD-CAM',
        'HD-CAM 360p',
        'HD-CAM 480p',
        'HD-CAM 720p',
        'HD-TS',
        'HD-TS 360p',
        'HD-TS 480p',
        'HD-TS 720p',
        'HD-TC',
        'HD-TC 360p',
        'HD-TC 480p',
        'HD-TC 720p',
        'HD-TV',
        'HD-TV 360p',
        'HD-TV 480p',
        'HD-TV 720p',
        'HDRip',
        'HDRip 360p',
        'HDRip 480p',
        'HDRip 720p',
        'HDRip 1080p',
        'WED-DL',
        'WED-DL 360p',
        'WED-DL 480p',
        'WED-DL 720p',
        'WED-DL 1080p',
        'WEB-HD',
        'WEB-HD 360p',
        'WEB-HD 480p',
        'WEB-HD 720p',
        'WEB-HD 1080p',
        'DVBRip',
        'DVBRip 360p',
        'DVBRip 480p',
        'DVBRip 720p',
        'DVBRip 1080p',
        'DVD',
        'DVD 360p',
        'DVD 480p',
        'DVD 720p',
        'DVD 1080p',
        'DVDRip',
        'DVDRip 360p',
        'DVDRip 480p',
        'DVDRip 720p',
        'DVDRip 1080p',
    ];
}
