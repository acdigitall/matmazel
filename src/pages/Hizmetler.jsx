import { motion } from 'framer-motion';
import sactasarim from '../assets/foto114.jpeg';
import renklendirme from '../assets/foto(5).jpeg';
import kesim from '../assets/kesim.jpeg';
import gelin from '../assets/gelin.jpeg';
import makyaj from '../assets/makyaj.jpeg';

const Hizmetler = () => {
  const fadeInUp = {
    initial: { opacity: 0, y: 40 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.8, ease: [0.25, 0.1, 0.25, 1] }
  };

  const staggerContainer = {
    initial: { opacity: 0 },
    animate: {
      opacity: 1,
      transition: {
        staggerChildren: 0.15,
        delayChildren: 0.1
      }
    }
  };

  const services = [
    {
      title: 'Saç Tasarımı',
      description: 'Her duruma uygun uzman tasarım hizmetleri. Zarif topuzlardan akan dalgalara kadar, stilistlerimiz kişisel stilinizi tamamlayan ve doğal güzelliğinizi vurgulayan görünümler yaratır.',
      features: ['Özel gün tasarımları', 'Günlük görünümler', 'Trend belirleyici tasarımlar', 'Kişiselleştirilmiş danışmanlık'],
      icon: '✂️',
      resim:sactasarim
    },
    {
      title: 'Renklendirme',
      description: 'Yüksek kaliteli ürünler kullanılarak premium renk işlemleri. İster ince highlightlar, ister cesur dönüşümler veya renk düzeltme istiyorsanız, çarpıcı sonuçlar sunuyoruz.',
      features: ['Highlight & Lowlight', 'Tam renklendirme', 'Renk düzeltme', 'Balayage & Ombre'],
      icon: '🎨',
      resim:renklendirme

    },
    {
      title: 'Kesim',
      description: 'Yüz şeklinize, yaşam tarzınıza ve kişisel tercihlerinize göre özelleştirilmiş hassas kesimler. Yetenekli stilistlerimiz, bakımı ve şekillendirmesi kolay, şık kesimler yaratır.',
      features: ['Hassas kesim teknikleri', 'Katmanlı stiller', 'Dokulu kesimler', 'Klasik & modern'],
      icon: '💇',
      resim:kesim

    },
    {
      title: 'Gelin Saçı',
      description: 'Özel gününüz için özel gelin saçı hizmetleri. Vizyonunuzla eşleşen ve düğün stilinizi tamamlayan mükemmel gelin görünümünü yaratmak için sizinle yakın çalışıyoruz.',
      features: ['Gelin danışmanlıkları', 'Deneme seansları', 'Düğün günü tasarımı', 'Gelin alayı paketleri'],
      icon: '👰',
      resim:gelin

    },
    {
      title: 'Profesyonel Makyaj',
      description: 'Tüm durumlar için kusursuz makyaj sanatı. Makyaj sanatçılarımız, özelliklerinizi vurgulamak ve uzun süre dayanıklı, güzel görünümler yaratmak için premium ürünler ve teknikler kullanır.',
      features: ['Gelin makyajı', 'Özel etkinlikler', 'Editorial görünümler', 'Doğal & glam'],
      icon: '💄',
      resim:makyaj

    },
  ];

  return (
    <div className="py-32">
      {/* Hero Section */}
      <section className="container mx-auto px-6 mb-32">
        <motion.div
          className="max-w-5xl mx-auto text-center"
          initial="initial"
          animate="animate"
          variants={staggerContainer}
        >
          <motion.h1
            className="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light"
            variants={fadeInUp}
          >
            Hizmetlerimiz
          </motion.h1>
          <motion.div
            className="w-32 h-px bg-champagne mx-auto mb-12"
            variants={fadeInUp}
          />
          <motion.p
            className="text-white/60 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto font-light"
            variants={fadeInUp}
          >
            Doğal güzelliğinizi geliştirmek için tasarlanmış kapsamlı premium güzellik hizmetleri yelpazemizi keşfedin
          </motion.p>
        </motion.div>
      </section>

      {/* Services List */}
      <section className="container mx-auto px-6">
        <div className="max-w-7xl mx-auto space-y-32">
          {services.map((service, index) => (
            <motion.div
              key={index}
              className={`flex flex-col ${index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse'} items-center gap-16`}
              initial="initial"
              whileInView="animate"
              viewport={{ once: true, amount: 0.3 }}
              variants={staggerContainer}
            >
     <motion.div
  className="flex-1 w-full md:w-auto"
  variants={fadeInUp}
>
  <div className="aspect-square relative overflow-hidden rounded-xl
                  bg-gradient-to-br from-champagne/10 to-transparent
                  border border-white/10 group
                  transition-all duration-500 hover:border-champagne/30">
      
    {/* Görsel */}
    <img
      src={service.resim}
      alt="Hizmet Görseli"
      className="w-full h-full object-cover scale-100 group-hover:scale-105 transition-transform duration-700"
    />

    {/* İç kenarlık */}
    <div className="absolute inset-0 border border-champagne/10 rounded-xl
                    group-hover:border-champagne/30 transition-colors duration-500">
    </div>
  </div>
</motion.div>

              
              <motion.div className="flex-1" variants={fadeInUp}>
                <h2 className="font-heading text-3xl md:text-5xl mb-6 tracking-wider font-light">
                  {service.title}
                </h2>
                <div className="w-24 h-px bg-champagne mb-8"></div>
                <p className="text-white/70 text-lg md:text-xl leading-relaxed mb-8 font-light">
                  {service.description}
                </p>
                <ul className="space-y-4">
                  {service.features.map((feature, idx) => (
                    <li key={idx} className="flex items-start text-white/60 group">
                      <span className="w-1.5 h-1.5 bg-champagne mr-4 mt-2 group-hover:scale-150 transition-transform duration-300"></span>
                      <span className="font-light">{feature}</span>
                    </li>
                  ))}
                </ul>
              </motion.div>
            </motion.div>
          ))}
        </div>
      </section>

      {/* CTA Section */}
      <section className="mt-32 py-32 bg-gradient-to-b from-black to-[#0a0a0a] relative">
        <div className="absolute inset-0 border-t border-b border-white/5"></div>
        <div className="container mx-auto px-6 text-center">
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <h2 className="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">
              Dönüşüme Hazır mısınız?
            </h2>
            <div className="w-24 h-px bg-champagne mx-auto mb-8"></div>
            <p className="text-white/60 text-lg md:text-xl mb-12 max-w-2xl mx-auto font-light leading-relaxed">
              Bugün randevunuzu alın ve MATMAZEL farkını deneyimleyin
            </p>
            <a
              href="https://www.instagram.com/ekipmatmazelizmit"
              target="_blank"
              rel="noopener noreferrer"
              className="group inline-flex items-center space-x-3 px-10 py-4 border border-champagne/50 text-champagne hover:bg-champagne hover:text-black transition-all duration-500 tracking-wider text-sm font-light relative overflow-hidden"
            >
              <span className="relative z-10">Instagram Üzerinden Randevu Al</span>
              <svg className="w-4 h-4 relative z-10 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
              </svg>
              <div className="absolute inset-0 bg-champagne transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            </a>
          </motion.div>
        </div>
      </section>
    </div>
  );
};

export default Hizmetler;






