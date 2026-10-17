import { motion } from 'framer-motion';

const Iletisim = () => {
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
  {/*
    const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    message: '',
  });
  */}

  {/*
    const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };
  */}

  {/*
    const handleSubmit = (e) => {
    e.preventDefault();
    // Backend olmadığı için mailto kullanıyoruz
    const subject = encodeURIComponent('MATMAZEL Web Sitesi İletişim Formu');
    const body = encodeURIComponent(
      `İsim: ${formData.name}\nE-posta: ${formData.email}\nTelefon: ${formData.phone}\n\nMesaj:\n${formData.message}`
    );
    window.location.href = `mailto:info@matmazel.com?subject=${subject}&body=${body}`;
  };
  */}


  return (
    <div className="py-32">
      {/* Hero Section */}
      <section className="container mx-auto px-6 mb-20">
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
            İletişim
          </motion.h1>
          <motion.div
            className="w-32 h-px bg-champagne mx-auto mb-12"
            variants={fadeInUp}
          />
          <motion.p
            className="text-white/60 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto font-light"
            variants={fadeInUp}
          >
            Randevu almak veya hizmetlerimiz hakkında bilgi almak için bizimle iletişime geçin
          </motion.p>
        </motion.div>
      </section>

      <div className="container mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-1 gap-20 max-w-7xl mx-auto">
          {/* Contact Information */}
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={staggerContainer}
          >
            <motion.h2
              className="font-heading text-3xl md:text-5xl mb-12 tracking-wider font-light"
              variants={fadeInUp}
            >
              Stüdyomuzu Ziyaret Edin
            </motion.h2>
            
            <div className="space-y-8 mb-12">
              <motion.div variants={fadeInUp}>
                <h3 className="text-champagne text-sm tracking-wider mb-3 font-light uppercase">Adres</h3>
                <p className="text-white/70 leading-relaxed font-light">
                  Karabaş mah. Süleymanpaşa sokak No:1 Zemin kat D :6<br />
                  İzmit/KOCAELİ
                </p>
                <a
                  href="https://maps.google.com/?q=Karabaş+mah.+Süleymanpaşa+sokak+No:1+Zemin+kat+D+:6+İzmit/KOCAELİ"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="inline-flex items-center space-x-2 text-champagne text-xs hover:underline mt-2 font-light"
                >
                  <span>Haritada Aç / Yol Tarifi Al</span>
                  <svg className="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg>
                </a>
              </motion.div>
              
              <motion.div variants={fadeInUp}>
                <h3 className="text-champagne text-sm tracking-wider mb-4 font-light uppercase">İletişim</h3>
                <div className="space-y-4">
                  <a
                    href="https://www.instagram.com/ekipmatmazelizmit"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="flex items-center space-x-4 text-white/70 hover:text-champagne transition-colors duration-300 group"
                  >
                    <div className="w-12 h-12 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                      <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                      </svg>
                    </div>
                    <span className="font-light">@ekipmatmazelizmit</span>
                  </a>
                  
                  <a
                    href="https://wa.me/905307003557"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="flex items-center space-x-4 text-white/70 hover:text-champagne transition-colors duration-300 group"
                  >
                    <div className="w-12 h-12 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                      <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                      </svg>
                    </div>
                    <span className="font-light">WhatsApp</span>
                  </a>

                  <a
                    href="tel:+905307003557"
                    className="flex items-center space-x-4 text-white/70 hover:text-champagne transition-colors duration-300 group"
                  >
                    <div className="w-12 h-12 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                      <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                    </div>
                    <span className="font-light">+90 530 700 35 57</span>
                  </a>
                </div>
              </motion.div>
            </div>

            {/* Google Maps Embed */}
            <motion.div
              className="w-full h-80 border border-white/10 overflow-hidden"
              variants={fadeInUp}
            >
              <iframe
                  src="https://maps.google.com/maps?q=Karaba%C5%9F+Mahallesi+S%C3%BCleymanpa%C5%9Fa+Sokak+No+1+Izmit+Kocaeli&t=&z=16&ie=UTF8&iwloc=&output=embed"
                  width="100%"
                  height="100%"
                  style={{ border: 0 }}
                  allowFullScreen={true}
                  loading="lazy"
                  referrerPolicy="no-referrer-when-downgrade"
                  className="opacity-80 hover:opacity-100 transition-opacity duration-300"
                  title="MATMAZEL Kuaför Konum"
              ></iframe>
            </motion.div>
          </motion.div>

          {/* Contact Form */}
          {/*
           <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={staggerContainer}
          >
            <motion.h2
              className="font-heading text-3xl md:text-5xl mb-12 tracking-wider font-light"
              variants={fadeInUp}
            >
              Mesaj Gönder
            </motion.h2>

            <form onSubmit={handleSubmit} className="space-y-6">
              <motion.div variants={fadeInUp}>
                <label htmlFor="name" className="block text-sm text-white/60 mb-3 tracking-wide font-light uppercase">
                  İsim
                </label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  value={formData.name}
                  onChange={handleChange}
                  className="w-full bg-white/5 border border-white/10 px-5 py-4 text-white focus:outline-none focus:border-champagne transition-all duration-300 font-light placeholder-white/30"
                  placeholder="Adınız Soyadınız"
                  required
                />
              </motion.div>

              <motion.div variants={fadeInUp}>
                <label htmlFor="email" className="block text-sm text-white/60 mb-3 tracking-wide font-light uppercase">
                  E-posta
                </label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  value={formData.email}
                  onChange={handleChange}
                  className="w-full bg-white/5 border border-white/10 px-5 py-4 text-white focus:outline-none focus:border-champagne transition-all duration-300 font-light placeholder-white/30"
                  placeholder="ornek@email.com"
                  required
                />
              </motion.div>

              <motion.div variants={fadeInUp}>
                <label htmlFor="phone" className="block text-sm text-white/60 mb-3 tracking-wide font-light uppercase">
                  Telefon
                </label>
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  value={formData.phone}
                  onChange={handleChange}
                  className="w-full bg-white/5 border border-white/10 px-5 py-4 text-white focus:outline-none focus:border-champagne transition-all duration-300 font-light placeholder-white/30"
                  placeholder="+90 555 123 45 67"
                />
              </motion.div>

              <motion.div variants={fadeInUp}>
                <label htmlFor="message" className="block text-sm text-white/60 mb-3 tracking-wide font-light uppercase">
                  Mesaj
                </label>
                <textarea
                  id="message"
                  name="message"
                  value={formData.message}
                  onChange={handleChange}
                  rows="6"
                  className="w-full bg-white/5 border border-white/10 px-5 py-4 text-white focus:outline-none focus:border-champagne transition-all duration-300 resize-none font-light placeholder-white/30"
                  placeholder="Mesajınız..."
                  required
                ></textarea>
              </motion.div>

              <motion.div variants={fadeInUp}>
                <button
                  type="submit"
                  className="group w-full px-10 py-4 border border-champagne/50 text-champagne hover:bg-champagne hover:text-black transition-all duration-500 tracking-wider text-sm font-light relative overflow-hidden"
                >
                  <span className="relative z-10">Mesaj Gönder</span>
                  <div className="absolute inset-0 bg-champagne transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </button>
              </motion.div>
            </form>
          </motion.div>
           */}

        </div>
      </div>
    </div>
  );
};

export default Iletisim;






