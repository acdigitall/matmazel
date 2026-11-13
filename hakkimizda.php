<?php
require __DIR__ . '/includes/bootstrap.php';

$page = [
    'path'        => '/hakkimizda',
    'title'       => 'Hakkımızda | MATMAZEL İzmit Kadın Kuaförü',
    'description' => "MATMAZEL İzmit'in misyonu, vizyonu ve deneyimli ekibi. Kadınlara özel premium saç ve makyaj hizmetlerinde mükemmellik, lüks ve yenilik.",
    'breadcrumb'  => 'Hakkımızda',
    'schema_type' => 'AboutPage',
];

$sections = [
    [
        'title' => 'Misyonumuz',
        'lead'  => "MATMAZEL İzmit'te, her kadının güzel, kendine güvenli ve güçlü hissetmeyi hak ettiğine inanıyoruz. Misyonumuz, doğal güzelliğinizi sadece geliştirmekle kalmayıp, aynı zamanda benzersiz kişiliğinizi ve stilinizi yansıtan premium saç ve makyaj hizmetleri sunmaktır.",
        'text'  => 'Her detayda mükemmelliğe bağlıyız; stüdyomuza adım attığınız andan, dönüşmüş ve ışıltılı bir şekilde ayrılana kadar.',
    ],
    [
        'title' => 'Profesyonel Geçmiş',
        'lead'  => 'Ekibimiz, sektörde yıllarca deneyime sahip, yüksek düzeyde yetenekli ve sertifikalı güzellik profesyonellerinden oluşmaktadır. En son trendler ve tekniklerle güncel kalıyor, sürekli olarak zanaatımızı geliştirerek olağanüstü sonuçlar sunuyoruz.',
        'text'  => 'Ekibimizin her üyesi güzellik sanatına tutkulu ve beklentileri aşan kişiselleştirilmiş hizmet sunmaya adanmıştır.',
    ],
    [
        'title' => 'Vizyonumuz',
        'lead'  => "MATMAZEL, İzmit'te lüks güzellik hizmetlerinin önde gelen destinasyonu olmayı hedefliyor. Müşterilerin rahatlayabileceği, yenilenebileceği ve güvenlerini yeniden keşfedebileceği bir zarafet ve sofistikasyon atmosferi yaratmaya çalışıyoruz.",
        'text'  => 'Vizyonumuz güzellik hizmetlerinin ötesine uzanıyor—müşterilerimizle kalıcı ilişkiler kurmayı, güzellik yolculuklarında güvenilir ortakları olmayı hedefliyoruz.',
    ],
];

$values = [
    ['Mükemmellik', 'Her hizmette mükemmelliği peşinde koşuyoruz, her detayda en yüksek kalite standartlarını sağlıyoruz.', 'val-sparkles'],
    ['Lüks', 'Her müşterinin özel, değerli ve şımartılmış hissetmesini sağlayan premium bir deneyim sunuyoruz.', 'val-gem'],
    ['Yenilik', 'En son teknikleri ve trendleri benimserken zamansız zarafet ve sofistikasyonu koruyoruz.', 'val-star'],
];

require __DIR__ . '/includes/header.php';
?>
<div class="py-32">

  <section class="container mx-auto px-6 mb-32">
    <div class="max-w-5xl mx-auto text-center">
      <h1 <?= reveal(0.1) ?> class="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light">Hakkımızda</h1>
      <div <?= reveal(0.3) ?>><?= divider('w-32 h-px bg-champagne mx-auto mb-12') ?></div>
    </div>
  </section>

  <section class="container mx-auto px-6 mb-32">
    <div class="max-w-5xl mx-auto">
<?php foreach ($sections as $i => $s): ?>
      <div class="<?= $i < count($sections) - 1 ? 'mb-20' : '' ?>">
        <h2 <?= reveal() ?> class="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light"><?= e($s['title']) ?></h2>
        <div <?= reveal(0.2) ?>><?= divider('w-24 h-px bg-champagne mb-12') ?></div>
        <p <?= reveal(0.4) ?> class="text-white/70 text-lg md:text-xl leading-relaxed mb-8 font-light"><?= e($s['lead']) ?></p>
        <p <?= reveal(0.6) ?> class="text-white/60 text-base md:text-lg leading-relaxed font-light"><?= e($s['text']) ?></p>
      </div>
<?php endforeach; ?>
    </div>
  </section>

  <section class="bg-gradient-to-b from-black to-[#0a0a0a] py-32 relative">
    <div class="absolute inset-0 border-t border-b border-white/5" aria-hidden="true"></div>
    <div class="container mx-auto px-6 relative">
      <div <?= reveal() ?> class="text-center mb-20">
        <h2 class="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">Değerlerimiz</h2>
        <?= divider() ?>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto">
<?php foreach ($values as $i => [$title, $desc, $ic]): ?>
        <div <?= reveal($i * 0.2) ?> class="text-center group">
          <div class="mb-8 h-24 flex items-center justify-center">
            <div class="w-20 h-20 border border-champagne/30 group-hover:border-champagne transition-colors duration-500 flex items-center justify-center relative">
              <span class="text-champagne"><?= icon($ic, 'w-9 h-9') ?></span>
              <span class="absolute inset-0 border border-champagne/10 group-hover:border-champagne/30 transition-colors duration-500 scale-75" aria-hidden="true"></span>
            </div>
          </div>
          <h3 class="font-heading text-2xl mb-4 tracking-wide font-light"><?= e($title) ?></h3>
          <p class="text-white/60 leading-relaxed font-light"><?= e($desc) ?></p>
        </div>
<?php endforeach; ?>
      </div>

      <div <?= reveal() ?> class="text-center mt-20">
        <?= cta_button('/hizmetler', 'Hizmetlerimizi İnceleyin') ?>
      </div>
    </div>
  </section>

</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
