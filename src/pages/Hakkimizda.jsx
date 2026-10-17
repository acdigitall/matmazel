import { motion } from 'framer-motion';

const Hakkimizda = () => {
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
        staggerChildren: 0.2,
        delayChildren: 0.1
      }
    }
  };

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
            Hakkımızda
          </motion.h1>
          <motion.div
            className="w-32 h-px bg-champagne mx-auto mb-12"
            variants={fadeInUp}
          />
        </motion.div>
      </section>

      {/* Mission Section */}
      <section className="container mx-auto px-6 mb-32">
        <div className="max-w-5xl mx-auto">
          <motion.div
            className="mb-20"
            initial="initial"
            whileInView="animate"
            viewport={{ once: true, amount: 0.3 }}
            variants={staggerContainer}
          >
            <motion.h2
              className="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light"
              variants={fadeInUp}
            >
              Misyonumuz
            </motion.h2>
            <motion.div className="w-24 h-px bg-champagne mb-12" variants={fadeInUp} />
            <motion.p
              className="text-white/70 text-lg md:text-xl leading-relaxed mb-8 font-light"
              variants={fadeInUp}
            >
              MATMAZEL İzmit'te, her kadının güzel, kendine güvenli ve güçlü hissetmeyi hak ettiğine inanıyoruz. 
              Misyonumuz, doğal güzelliğinizi sadece geliştirmekle kalmayıp, aynı zamanda benzersiz 
              kişiliğinizi ve stilinizi yansıtan premium saç ve makyaj hizmetleri sunmaktır.
            </motion.p>
            <motion.p
              className="text-white/60 text-base md:text-lg leading-relaxed font-light"
              variants={fadeInUp}
            >
              Her detayda mükemmelliğe bağlıyız; stüdyomuza adım attığınız andan, dönüşmüş ve 
              ışıltılı bir şekilde ayrılana kadar.
            </motion.p>
          </motion.div>

          <motion.div
            className="mb-20"
            initial="initial"
            whileInView="animate"
            viewport={{ once: true, amount: 0.3 }}
            variants={staggerContainer}
          >
            <motion.h2
              className="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light"
              variants={fadeInUp}
            >
              Profesyonel Geçmiş
            </motion.h2>
            <motion.div className="w-24 h-px bg-champagne mb-12" variants={fadeInUp} />
            <motion.p
              className="text-white/70 text-lg md:text-xl leading-relaxed mb-8 font-light"
              variants={fadeInUp}
            >
              Ekibimiz, sektörde yıllarca deneyime sahip, yüksek düzeyde yetenekli ve sertifikalı 
              güzellik profesyonellerinden oluşmaktadır. En son trendler ve tekniklerle güncel 
              kalıyor, sürekli olarak zanaatımızı geliştirerek olağanüstü sonuçlar sunuyoruz.
            </motion.p>
            <motion.p
              className="text-white/60 text-base md:text-lg leading-relaxed font-light"
              variants={fadeInUp}
            >
              Ekibimizin her üyesi güzellik sanatına tutkulu ve beklentileri aşan kişiselleştirilmiş 
              hizmet sunmaya adanmıştır.
            </motion.p>
          </motion.div>

          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true, amount: 0.3 }}
            variants={staggerContainer}
          >
            <motion.h2
              className="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light"
              variants={fadeInUp}
            >
              Vizyonumuz
            </motion.h2>
            <motion.div className="w-24 h-px bg-champagne mb-12" variants={fadeInUp} />
            <motion.p
              className="text-white/70 text-lg md:text-xl leading-relaxed mb-8 font-light"
              variants={fadeInUp}
            >
              MATMAZEL, İzmit'te lüks güzellik hizmetlerinin önde gelen destinasyonu olmayı hedefliyor. 
              Müşterilerin rahatlayabileceği, yenilenebileceği ve güvenlerini yeniden keşfedebileceği 
              bir zarafet ve sofistikasyon atmosferi yaratmaya çalışıyoruz.
            </motion.p>
            <motion.p
              className="text-white/60 text-base md:text-lg leading-relaxed font-light"
              variants={fadeInUp}
            >
              Vizyonumuz güzellik hizmetlerinin ötesine uzanıyor—müşterilerimizle kalıcı ilişkiler 
              kurmayı, güzellik yolculuklarında güvenilir ortakları olmayı hedefliyoruz.
            </motion.p>
          </motion.div>
        </div>
      </section>

      {/* Values Section */}
      <section className="bg-gradient-to-b from-black to-[#0a0a0a] py-32 relative">
        <div className="absolute inset-0 border-t border-b border-white/5"></div>
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
              Değerlerimiz
            </motion.h2>
            <motion.div
              className="w-24 h-px bg-champagne mx-auto"
              variants={fadeInUp}
            />
          </motion.div>
          
          <div className="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto">
            {[
              {
                title: 'Mükemmellik',
                description: 'Her hizmette mükemmelliği peşinde koşuyoruz, her detayda en yüksek kalite standartlarını sağlıyoruz.',
                icon: '✨',
              },
              {
                title: 'Lüks',
                description: 'Her müşterinin özel, değerli ve şımartılmış hissetmesini sağlayan premium bir deneyim sunuyoruz.',
                icon: '👑',
              },
              {
                title: 'Yenilik',
                description: 'En son teknikleri ve trendleri benimserken zamansız zarafet ve sofistikasyonu koruyoruz.',
                icon: '💫',
              },
            ].map((value, index) => (
              <motion.div
                key={index}
                className="text-center group"
                initial="initial"
                whileInView="animate"
                viewport={{ once: true }}
                variants={{
                  ...fadeInUp,
                  transition: { duration: 0.6, delay: index * 0.2 }
                }}
              >
                <div className="mb-8 h-24 flex items-center justify-center">
                  <div className="w-20 h-20 border border-champagne/30 group-hover:border-champagne transition-colors duration-500 flex items-center justify-center relative">
                    <div className="text-4xl">{value.icon}</div>
                    <div className="absolute inset-0 border border-champagne/10 group-hover:border-champagne/30 transition-colors duration-500 scale-75"></div>
                  </div>
                </div>
                <h3 className="font-heading text-2xl mb-4 tracking-wide font-light">{value.title}</h3>
                <p className="text-white/60 leading-relaxed font-light">{value.description}</p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
};

export default Hakkimizda;






