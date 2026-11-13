<?php
/**
 * MATMAZEL İzmit — site genel ayarları ve içerik verileri.
 * İletişim bilgisi, hizmet ya da galeri değişiklikleri yalnızca bu dosyadan yapılır.
 */

if (!defined('MATMAZEL')) {
    http_response_code(403);
    exit;
}

const SITE_URL   = 'https://matmazelizmit.com';
const SITE_NAME  = 'MATMAZEL İzmit Hair & Make Up Studio';
const SITE_SHORT = 'MATMAZEL İzmit';

const PHONE_E164    = '+905307003557';
const PHONE_DISPLAY = '+90 530 700 35 57';
const WHATSAPP_URL  = 'https://wa.me/905307003557';
const INSTAGRAM_URL = 'https://www.instagram.com/ekipmatmazelizmit';
const INSTAGRAM_HANDLE = '@ekipmatmazelizmit';

const ADDRESS_STREET   = 'Karabaş mah. Süleymanpaşa sokak No:1 Zemin kat D :6';
const ADDRESS_LOCALITY = 'İzmit';
const ADDRESS_REGION   = 'Kocaeli';
const ADDRESS_FULL     = ADDRESS_STREET . ' İzmit/KOCAELİ';

const MAPS_URL   = 'https://maps.google.com/?q=Karaba%C5%9F+mah.+S%C3%BCleymanpa%C5%9Fa+sokak+No:1+Zemin+kat+D+:6+%C4%B0zmit/KOCAEL%C4%B0';
const MAPS_EMBED = 'https://maps.google.com/maps?q=Karaba%C5%9F+Mahallesi+S%C3%BCleymanpa%C5%9Fa+Sokak+No+1+Izmit+Kocaeli&t=&z=16&ie=UTF8&iwloc=&output=embed';

const OG_IMAGE = '/assets/img/og-matmazel-izmit.jpg';

/** Menü: yol => etiket */
const NAV_ITEMS = [
    '/'           => 'Ana Sayfa',
    '/hakkimizda' => 'Hakkımızda',
    '/hizmetler'  => 'Hizmetler',
    '/galeri'     => 'Galeri',
    '/iletisim'   => 'İletişim',
];

/** Hizmetler (ana sayfa özet + hizmetler sayfası) */
const SERVICES = [
    [
        'id'      => 'sac-tasarimi',
        'title'   => 'Saç Tasarımı',
        'short'   => 'Her duruma uygun uzman tasarım',
        'icon'    => 'svc-dryer',
        'image'   => 'izmit-kuafor-kahve-katli-kesim',
        'alt'     => 'İzmit kuaför saç tasarımı: kahve tonlarında katlı kesim ve fön',
        'description' => 'Her duruma uygun uzman tasarım hizmetleri. Zarif topuzlardan akan dalgalara kadar, stilistlerimiz kişisel stilinizi tamamlayan ve doğal güzelliğinizi vurgulayan görünümler yaratır.',
        'features' => ['Özel gün tasarımları', 'Günlük görünümler', 'Trend belirleyici tasarımlar', 'Kişiselleştirilmiş danışmanlık'],
    ],
    [
        'id'      => 'renklendirme',
        'title'   => 'Renklendirme',
        'short'   => 'Premium renk işlemleri ve teknikler',
        'icon'    => 'svc-palette',
        'image'   => 'izmit-kuafor-sari-balyaj-dalgali-sac-2',
        'alt'     => 'İzmit saç boyama: sarı balyaj ve dalgalı saç renklendirme',
        'description' => 'Yüksek kaliteli ürünler kullanılarak premium renk işlemleri. İster ince highlightlar, ister cesur dönüşümler veya renk düzeltme istiyorsanız, çarpıcı sonuçlar sunuyoruz.',
        'features' => ['Highlight & Lowlight', 'Tam renklendirme', 'Renk düzeltme', 'Balayage & Ombre'],
    ],
    [
        'id'      => 'kesim',
        'title'   => 'Kesim',
        'short'   => 'Stilinize özel hassas kesimler',
        'icon'    => 'svc-scissors',
        'image'   => 'izmit-kuafor-uzun-katli-sac-kesimi',
        'alt'     => 'İzmit kadın saç kesimi: uzun katlı kesim',
        'description' => 'Yüz şeklinize, yaşam tarzınıza ve kişisel tercihlerinize göre özelleştirilmiş hassas kesimler. Yetenekli stilistlerimiz, bakımı ve şekillendirmesi kolay, şık kesimler yaratır.',
        'features' => ['Hassas kesim teknikleri', 'Katmanlı stiller', 'Dokulu kesimler', 'Klasik & modern'],
    ],
    [
        'id'      => 'gelin-saci',
        'title'   => 'Gelin Saçı',
        'short'   => 'Özel gelin saçı hizmetleri',
        'icon'    => 'svc-crown',
        'image'   => 'izmit-gelin-saci-ve-makyaji',
        'alt'     => 'İzmit gelin saçı ve gelin makyajı, taçlı gelin başı',
        'description' => 'Özel gününüz için özel gelin saçı hizmetleri. Vizyonunuzla eşleşen ve düğün stilinizi tamamlayan mükemmel gelin görünümünü yaratmak için sizinle yakın çalışıyoruz.',
        'features' => ['Gelin danışmanlıkları', 'Deneme seansları', 'Düğün günü tasarımı', 'Gelin alayı paketleri'],
    ],
    [
        'id'      => 'profesyonel-makyaj',
        'title'   => 'Profesyonel Makyaj',
        'short'   => 'Kusursuz makyaj sanatı',
        'icon'    => 'svc-lipstick',
        'image'   => 'izmit-profesyonel-makyaj',
        'alt'     => 'İzmit profesyonel makyaj: nişan ve özel gün makyajı',
        'description' => 'Tüm durumlar için kusursuz makyaj sanatı. Makyaj sanatçılarımız, özelliklerinizi vurgulamak ve uzun süre dayanıklı, güzel görünümler yaratmak için premium ürünler ve teknikler kullanır.',
        'features' => ['Gelin makyajı', 'Özel etkinlikler', 'Editorial görünümler', 'Doğal & glam'],
    ],
];

/** Galeri: dosya adı (uzantısız, boyutsuz) => [alt, yerleşim] */
const GALLERY = [
    ['izmit-kuafor-kullu-kumral-balyaj-1',            'Küllü kumral balyaj ve dalgalı fön, Matmazel İzmit',          'tall'],
    ['izmit-kuafor-kullu-kumral-balyaj-2',            'Küllü kumral balyaj saç rengi, İzmit kadın kuaförü',          'wide'],
    ['izmit-kuafor-dalgali-fon-balyaj',               'Hacimli dalgalı fön ve balyaj, İzmit kuaför',                 'square'],
    ['izmit-kuafor-sari-balyaj-dalgali-sac-1',        'Sarı balyaj ve uzun dalgalı saç, Matmazel İzmit',             'tall'],
    ['izmit-kuafor-sari-balyaj-dalgali-sac-2',        'Sarı balyaj dalgalı saç şekillendirme, İzmit',                'wide'],
    ['izmit-kuafor-kisa-kesim-kahve-sac',             'Omuz hizası kısa kesim, kahve saç, İzmit kadın kuaförü',      'square'],
    ['izmit-kuafor-platin-sari-katli-kesim-1',        'Platin sarı saç rengi ve katlı kesim, İzmit',                 'tall'],
    ['izmit-kuafor-platin-sari-katli-kesim-2',        'Platin sarı uzun katlı kesim, Matmazel İzmit',                'wide'],
    ['izmit-kuafor-sari-perdeli-kesim',               'Sarı saçta perdeli kesim, İzmit kuaför',                      'square'],
    ['izmit-kuafor-bakir-kahve-balyaj',               'Bakır kahve balyaj ve uzun dalgalı saç, İzmit',               'tall'],
    ['izmit-kuafor-koyu-kahve-dalgali-sac',           'Koyu kahve dalgalı saç tasarımı, Matmazel İzmit',             'wide'],
    ['izmit-kuafor-bal-sarisi-balyaj',                'Bal sarısı balyaj ve dalgalı fön, İzmit kadın kuaförü',       'square'],
    ['izmit-kuafor-kullu-sari-balyaj-perdeli-kesim',  'Küllü sarı balyaj ve perdeli kesim, İzmit',                   'tall'],
    ['izmit-kuafor-kahve-katli-kesim',                'Kahve tonlarında katlı kesim ve perçem, İzmit kuaför',        'wide'],
    ['izmit-kuafor-kullu-ombre-katli-kesim',          'Küllü ombre ve katlı kesim, Matmazel İzmit',                  'square'],
    ['izmit-kuafor-kullu-sari-ombre',                 'Küllü sarı ombre saç rengi, İzmit',                           'tall'],
    ['izmit-kuafor-karamel-balyaj-uzun-sac',          'Karamel balyaj uzun dalgalı saç, İzmit kadın kuaförü',        'wide'],
];

/** Müşteri yorumları */
const TESTIMONIALS = [
    [
        'text'   => 'Efe bey ve ekibine çok teşekkür ediyorum, koyu bir kızıl tonundan saçımı nerdeyse yıpranmadan istediğim kumral rengine döndürdüler. Çok ayrıntılı bir şekilde saçımdaki renk değişiminin nasıl istediğim gibi olabileceğini anlattılar. Ekipce hoş sohbet ve muhabbetle zamanın nasıl geçtiğini anlamadan saatler hızla geçti ilgisinden dolayı herkese teşekkür ederim.',
        'author' => 'Hatice A.',
        'rating' => 5,
    ],
    [
        'text'   => 'merhabalar az önce matmazel kuaförden çıktım, öncelikle çınar bey ve ekip arkadaşlarına çok teşekkür ederim, çok ilgili ve güler yüzlülüler. saçlarımı istediğim renkten çok daha güzel yaptılar. 5 yıldızdan çok daha fazlasını hakediyolar. ellerine sağlık',
        'author' => 'Merve A.',
        'rating' => 5,
    ],
    [
        'text'   => 'Tavsiye üzerine geldiğim bır salondan daimi kuaförüm olacak sekılde ayrıldım . Güler yuz ve profesyonel hizmet ile mutsuz ayrılmanız mümkün degil . Hepinize çok teşekkür ederim 🌼🙏🏻',
        'author' => 'Özlem B.',
        'rating' => 5,
    ],
];
