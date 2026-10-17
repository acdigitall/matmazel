import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import Logo from '../components/Logo';
import image1 from '../assets/foto(1).jpeg';
import image2 from '../assets/foto(4).jpeg';
import image3 from '../assets/foto(8).jpeg';
import image4 from '../assets/foto11.jpeg';
import aboutImage from '../assets/icmekanmatmazel.jpeg';

const Home = () => {
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
        delayChildren: 0.2
      }
    }
  };

  const services = [
    {
      title: 'Saç Tasarımı',
      description: 'Her duruma uygun uzman tasarım',
      icon: '✂️',
    },
    {
      title: 'Renklendirme',
      description: 'Premium renk işlemleri ve teknikler',
      icon: '🎨',
    },
    {
      title: 'Kesim',
      description: 'Stilinize özel hassas kesimler',
      icon: '💇',
    },
    {
      title: 'Gelin Saçı',
      description: 'Özel gelin saçı hizmetleri',
      icon: '👰',
    },
    {
      title: 'Profesyonel Makyaj',
      description: 'Kusursuz makyaj sanatı',
      icon: '💄',
    },
  ];

  const testimonials = [
    {
      text: 'Efe bey ve ekibine çok teşekkür ediyorum, koyu bir kızıl tonundan saçımı nerdeyse yıpranmadan istediğim kumral rengine döndürdüler. Çok ayrıntılı bir şekilde saçımdaki renk değişiminin nasıl istediğim gibi olabileceğini anlattılar. Ekipce hoş sohbet ve muhabbetle zamanın nasıl geçtiğini anlamadan saatler hızla geçti ilgisinden dolayı herkese teşekkür ederim.',
      author: '— Hatice A.',
      rating: 5,
    },
    {
      text: 'merhabalar az önce matmazel kuaförden çıktım, öncelikle çınar bey ve ekip arkadaşlarına çok teşekkür ederim, çok ilgili ve güler yüzlülüler. saçlarımı istediğim renkten çok daha güzel yaptılar. 5 yıldızdan çok daha fazlasını hakediyolar. ellerine sağlık',
      author: '— Merve A.',
      rating: 5,
    },
    {
      text: 'Tavsiye üzerine geldiğim bır salondan daimi kuaförüm olacak sekılde ayrıldım . Güler yuz ve profesyonel hizmet ile mutsuz ayrılmanız mümkün degil . Hepinize çok teşekkür ederim 🌼🙏🏻',
      author: '— Özlem B.',
      rating: 5,
    },
  ];

  return (
    <div className="overflow-hidden">
      {/* Hero Section */}
      <section className="min-h-screen flex items-center justify-center relative bg-gradient-to-br from-black via-[#0a0a0a] to-black">
        {/* Subtle background pattern */}
        <div className="absolute inset-0 opacity-[0.03]">
          <div className="absolute inset-0" style={{
            backgroundImage: `radial-gradient(circle at 1px 1px, white 1px, transparent 0)`,
            backgroundSize: '50px 50px'
          }}></div>
        </div>
        
        {/* Ambient light effects */}
        <div className="absolute inset-0 overflow-hidden">
          <motion.div
            className="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-champagne/5 rounded-full blur-3xl"
            animate={{
              scale: [1, 1.2, 1],
              opacity: [0.3, 0.5, 0.3],
            }}
            transition={{
              duration: 8,
              repeat: Infinity,
              ease: 'easeInOut'
            }}
          />
          <motion.div
            className="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-champagne/3 rounded-full blur-3xl"
            animate={{
              scale: [1.2, 1, 1.2],
              opacity: [0.2, 0.4, 0.2],
            }}
            transition={{
              duration: 10,
              repeat: Infinity,
              ease: 'easeInOut'
            }}
          />
        </div>
        
        <motion.div
          className="container mx-auto px-6 text-center z-10 relative"
          variants={staggerContainer}
          initial="initial"
          animate="animate"
        >
          <motion.div variants={fadeInUp} className="mb-8 flex justify-center">
            <Logo variant="default" className="justify-center" />
          </motion.div>
          
          <motion.p
            className="text-xl md:text-2xl lg:text-3xl text-white/70 mb-4 tracking-[0.2em] font-light uppercase"
            variants={fadeInUp}
          >
            Premium Hair & Make Up Studio
          </motion.p>
          
          <motion.div
            className="w-24 h-px bg-champagne mx-auto mb-12"
            variants={fadeInUp}
          />
          
          <motion.p
            className="text-base md:text-lg text-white/50 mb-12 max-w-2xl mx-auto leading-relaxed font-light"
            variants={fadeInUp}
          >
            Hassasiyet ve sanatla hazırlanmış lüks güzellik hizmetleri deneyimi
          </motion.p>

          <motion.div variants={fadeInUp} className="w-full flex justify-center">
            <div className="flex flex-col sm:flex-col gap-3 w-full max-w-xl justify-center items-center">

              {/* Instagram Butonu */}
              <a
                  href="https://www.instagram.com/ekipmatmazelizmit"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="group inline-flex items-center justify-center space-x-2 px-6 py-3 border border-champagne/50 text-champagne
                 hover:bg-champagne hover:text-black transition-all duration-500 tracking-wider text-sm font-light relative
                 overflow-hidden w-full "
              >
                <span className="relative z-10 whitespace-nowrap">Instagram'dan Randevu Al</span>
                <svg className="w-4 h-4 relative z-10 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
                </svg>
                <div className="absolute inset-0 bg-champagne transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
              </a>

              {/* WhatsApp Butonu */}
              <a
                  href="https://wa.me/905307003557"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="group inline-flex items-center justify-center space-x-2 px-6 py-3 border border-champagne/50 text-champagne
                 hover:bg-champagne hover:text-black transition-all duration-500 tracking-wider text-sm font-light relative
                 overflow-hidden w-full "
              >
                <span className="relative z-10 whitespace-nowrap">WhatsApp'tan İletişime Geç</span>
                <svg className="w-4 h-4 relative z-10 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
                </svg>
                <div className="absolute inset-0 bg-champagne transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
              </a>

            </div>
          </motion.div>

        </motion.div>

        {/* Scroll indicator */}
        <motion.div
          className="absolute bottom-12 left-1/2 transform -translate-x-1/2"
          animate={{ y: [0, 10, 0] }}
          transition={{ duration: 2, repeat: Infinity }}
        >
          <div className="w-px h-12 bg-gradient-to-b from-champagne/50 to-transparent"></div>
        </motion.div>
      </section>

      {/* About Preview Section */}
      <section className="py-32 bg-black relative">
        <div className="absolute inset-0 border-t border-b border-white/5"></div>
        <div className="container mx-auto px-6">
          <motion.div
            className="max-w-4xl mx-auto"
            initial="initial"
            whileInView="animate"
            viewport={{ once: true, amount: 0.3 }}
            variants={staggerContainer}
          >
            <motion.div variants={fadeInUp} className="text-center mb-16">
              <h2 className="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">
                Stüdyo Hakkında
              </h2>
              <div className="w-24 h-px bg-champagne mx-auto mb-8"></div>
            </motion.div>
            
            <motion.div variants={fadeInUp} className="grid md:grid-cols-2 gap-16 items-center">
              <div>
                <p className="text-white/70 text-lg leading-relaxed mb-6 font-light">
                  MATMAZEL, İzmit'te kadınlara özel premium saç ve makyaj hizmetleri sunan 
                  bir lüks stüdyodur. Uzman ekibimiz, sanatçılık ile hassasiyeti birleştirerek 
                  benzersiz stilinizi ve kişiliğinizi yansıtan çarpıcı dönüşümler yaratır.
                </p>
                <p className="text-white/60 text-base leading-relaxed mb-8 font-light">
                  Güzelliğin bir sanat formu olduğuna inanıyoruz ve her müşterinin 
                  kendine güvenli, şık ve ışıltılı hissetmeyi hak ettiğini düşünüyoruz.
                </p>
                <Link
                  to="/hakkimizda"
                  className="inline-flex items-center space-x-2 text-champagne hover:text-white transition-colors duration-300 tracking-wider text-sm font-light group"
                >
                  <span>Daha Fazla Bilgi</span>
                  <svg className="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
                  </svg>
                </Link>
              </div>
              <div className="relative">
                <div className="aspect-square bg-white/5 border border-white/10 p-8">
                  <div className="w-full h-full bg-gradient-to-br from-champagne/10 to-transparent">
                    <img
                    className='  className="w-full h-full object-cover'
                    style={{ width: "100%" }}
                    src={aboutImage}
                      alt='İzmit Kadın Kufaör - Matmazel İzmit'
                    />
                    
                  </div>
                </div>
              </div>
            </motion.div>
          </motion.div>
        </div>
      </section>

      {/* Services Highlights */}
      <section className="py-32 bg-gradient-to-b from-black to-[#0a0a0a]">
        <div className="container mx-auto px-6">
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true, amount: 0.2 }}
            variants={staggerContainer}
            className="text-center mb-20"
          >
            <motion.h2
              className="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light"
              variants={fadeInUp}
            >
              Hizmetlerimiz
            </motion.h2>
            <motion.div
              className="w-24 h-px bg-champagne mx-auto"
              variants={fadeInUp}
            />
          </motion.div>
          
          <div className="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 max-w-7xl mx-auto">
            {services.map((service, index) => (
              <motion.div
                key={index}
                className="group text-center"
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                variants={{
                  ...fadeInUp,
                  transition: { duration: 0.6, delay: index * 0.1 }
                }}
              >
                <div className="mb-6 h-20 flex items-center justify-center">
                  <div className="w-16 h-16 border border-champagne/30 group-hover:border-champagne transition-colors duration-500 flex items-center justify-center relative">
                    <div className="text-2xl">{service.icon}</div>
                    <div className="absolute inset-0 border border-champagne/10 group-hover:border-champagne/30 transition-colors duration-500 scale-75"></div>
                  </div>
                </div>
                <h3 className="font-heading text-lg mb-3 tracking-wide font-light">{service.title}</h3>
                <p className="text-white/50 text-sm leading-relaxed font-light">{service.description}</p>
              </motion.div>
            ))}
          </div>
          
          <motion.div
            className="text-center mt-16"
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <Link
              to="/hizmetler"
              className="inline-flex items-center space-x-2 text-champagne hover:text-white transition-colors duration-300 tracking-wider text-sm font-light group"
            >
              <span>Tüm Hizmetleri Gör</span>
              <svg className="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
              </svg>
            </Link>
          </motion.div>
        </div>
      </section>

      {/* Gallery Preview */}
      <section className="py-32 bg-black relative">
        <div className="absolute inset-0 border-t border-b border-white/5"></div>
        <div className="container mx-auto px-6">
          <motion.div
            className="text-center mb-16"
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <h2 className="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">
              Galeri
            </h2>
            <div className="w-24 h-px bg-champagne mx-auto mb-8"></div>
            <p className="text-white/60 text-lg max-w-2xl mx-auto font-light">
              Çarpıcı dönüşümler portföyümüzü keşfedin
            </p>
          </motion.div>
          
          <div className="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
            {[image1, image2, image3, image4].map((img, index) => (
              <motion.div
                key={index}
                className="aspect-square overflow-hidden border border-white/10 hover:border-champagne/50 transition-colors duration-500 group relative"
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                variants={{
                  ...fadeInUp,
                  transition: { duration: 0.6, delay: index * 0.1 }
                }}
                whileHover={{ scale: 1.02 }}
              >
                <img
                  src={img}
                  alt="matmazel izmit , izmit kadın kuaför"
                  className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                />
                <div className="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors duration-500"></div>
              </motion.div>
            ))}
          </div>
          
          <motion.div
            className="text-center mt-12"
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <Link
              to="/galeri"
              className="inline-flex items-center space-x-2 text-champagne hover:text-white transition-colors duration-300 tracking-wider text-sm font-light group"
            >
              <span>Tam Galeriyi Gör</span>
              <svg className="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
              </svg>
            </Link>
          </motion.div>
        </div>
      </section>

      {/* Testimonials */}
      <section className="py-32 bg-gradient-to-b from-[#0a0a0a] to-black">
        <div className="container mx-auto px-6">
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={staggerContainer}
            className="text-center mb-20"
          >
            <motion.h2
              className="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light"
              variants={fadeInUp}
            >
              Müşteri Yorumları
            </motion.h2>
            <motion.div
              className="w-24 h-px bg-champagne mx-auto"
              variants={fadeInUp}
            />
          </motion.div>
          
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            {testimonials.map((testimonial, index) => (
              <motion.div
                key={index}
                className="border border-white/10 p-8 hover:border-champagne/30 transition-colors duration-500 relative group"
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                variants={{
                  ...fadeInUp,
                  transition: { duration: 0.6, delay: index * 0.2 }
                }}
              >
                <div className="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-champagne/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div className="mb-4 flex space-x-1">
                  {[...Array(testimonial.rating)].map((_, i) => (
                    <svg key={i} className="w-4 h-4 text-champagne" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                  ))}
                </div>
                <p className="text-white/70 mb-6 leading-relaxed italic font-light">
                  "{testimonial.text}"
                </p>
                <p className="text-champagne text-sm tracking-wide font-light">
                  {testimonial.author}
                </p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Contact CTA */}
      <section className="py-32 bg-black relative">
        <div className="absolute inset-0 border-t border-white/5"></div>
        <div className="container mx-auto px-6 text-center">
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <h2 className="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">
              Bizi Ziyaret Edin
            </h2>
            <div className="w-24 h-px bg-champagne mx-auto mb-8"></div>
            <p className="text-white/60 text-lg mb-4 max-w-2xl mx-auto font-light leading-relaxed">
              İzmit'in kalbinde yer alan stüdyomuzda lüks güzellik hizmetlerini deneyimlemeye davetlisiniz.
            </p>
            <p className="text-champagne/80 text-sm md:text-base mb-12 max-w-2xl mx-auto font-light tracking-wide">
              Karabaş mah. Süleymanpaşa sokak No:1 Zemin kat D :6 İzmit/KOCAELİ
            </p>
            <Link
              to="/iletisim"
              className="group inline-flex items-center space-x-3 px-10 py-4 border border-champagne/50 text-champagne hover:bg-champagne hover:text-black transition-all duration-500 tracking-wider text-sm font-light relative overflow-hidden"
            >
              <span className="relative z-10">İletişime Geç</span>
              <svg className="w-4 h-4 relative z-10 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
              </svg>
              <div className="absolute inset-0 bg-champagne transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            </Link>
          </motion.div>
        </div>
      </section>
    </div>
  );
};

export default Home;






