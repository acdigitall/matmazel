import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Layout from './components/Layout';
import Home from './pages/Home';
import Hakkimizda from './pages/Hakkimizda';
import Hizmetler from './pages/Hizmetler';
import Galeri from './pages/Galeri';
import Iletisim from './pages/Iletisim';
import ScrollToTop from "./components/ScrollTop.jsx";
import LocationPopup from "./components/LocationPopup.jsx";

function App() {
  return (
    <Router>
      <Layout>
        <ScrollToTop />
        <LocationPopup />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/hakkimizda" element={<Hakkimizda />} />
          <Route path="/hizmetler" element={<Hizmetler />} />
          <Route path="/galeri" element={<Galeri />} />
          <Route path="/iletisim" element={<Iletisim />} />
        </Routes>
      </Layout>
    </Router>
  );
}

export default App;
