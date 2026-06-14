<style>
    @keyframes slideInUpSmoothMap {
        0% { opacity: 0; transform: translateY(60px); filter: blur(5px); }
        100% { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .smooth-element-map {
        opacity: 0; 
        transform: translateY(60px); 
        backface-visibility: hidden;
    }
    .smooth-active-map {
        animation: slideInUpSmoothMap 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .delay-map-1 { animation-delay: 0.1s; }
    .delay-map-2 { animation-delay: 0.3s; }
</style>

<section class="w-full pt-8 pb-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="reveal-target-map smooth-element-map delay-map-1 text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
                {{ __('Sumatra Map') }}
            </h2>
            <p class="reveal-target-map smooth-element-map delay-map-2 text-lg text-gray-500 font-light">
                {{ __('Click on a province to view OOH/DOOH data (sample).') }}
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-6 items-stretch justify-center">
            
            <div class="w-full lg:w-7/12 bg-[#f6fbff] p-3 rounded-2xl shadow-[0_6px_20px_rgba(0,0,0,0.06)] flex flex-col">
                <div class="w-full flex-grow relative min-h-[400px] lg:min-h-[450px]">
                    <svg id="sumatraSvg" class="w-full h-full absolute inset-0 block rounded-xl"></svg>
                </div>
            </div>

            <aside id="mapInfo" class="w-full lg:w-5/12 bg-white p-6 rounded-2xl shadow-[0_6px_20px_rgba(0,0,0,0.06)] flex flex-col justify-center">
                <div id="mapInfoContent" class="font-sans text-sm w-full">
                    <div class="font-bold text-2xl text-gray-900 mb-1">{{ __('Select a province on the map') }}</div>
                    <div class="text-gray-400">{{ __('OOH/DOOH information will be displayed here') }}</div>
                </div>
            </aside>

        </div>
    </div>
</section>

<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
(async function() {
    const geoJsonUrl = '/geojson/id.json';
    const apiUrl = '/api/map-data';

    const sumatraProvNames = [
        'Aceh','Sumatera Utara','Sumatera Barat','Riau','Kepulauan Riau',
        'Jambi','Bengkulu','Sumatera Selatan','Bangka Belitung','Lampung','Bangka-Belitung',
    ];

    const svg = d3.select('#sumatraSvg');
    const g = svg.append('g');
    const projection = d3.geoMercator();
    const pathGen = d3.geoPath().projection(projection);
    let fc = null; 

    function showInfo(props, data) {
        const name = props.NAME_1 || props.name || props.provinsi || '';
        const found = data.find(item => item.provinsi && name.toLowerCase().includes(item.provinsi.toLowerCase()));
        
        const billboards = found ? found.billboards : 0;
        const videotron = found ? found.videotron : 0;
        const allLocations = [...(found?.lokasi_ooh || []), ...(found?.lokasi_videotron || [])];
        const topLocations = allLocations.length > 0 ? allLocations.sort(() => 0.5 - Math.random()).slice(0, 3) : ['{{ __('Location data is currently unavailable') }}'];

        document.getElementById('mapInfoContent').innerHTML = `
            <div class="font-sans text-[15px] leading-relaxed">
                <div class="font-bold text-2xl text-gray-900">${name}</div>
                <div class="text-gray-400 mt-1 mb-4">{{ __('OOH/DOOH Information') }}</div>
                <div class="border-t border-gray-100 pt-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">{{ __('Billboard') }}</span><strong class="text-lg">${billboards}</strong>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-600">{{ __('Videotron') }}</span><strong class="text-lg">${videotron}</strong>
                    </div>
                    <div class="mt-4">
                        <strong class="text-gray-800">{{ __('Top Locations') }}</strong>
                        <ul class="mt-3 space-y-2">
                            ${topLocations.map(l => `
                                <li class="relative pl-5 text-gray-600">
                                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-2 h-2 bg-green-500 rounded-full"></span>
                                    ${l}
                                </li>`).join('')}
                        </ul>
                    </div>
                    <a href="/discover?region=${encodeURIComponent(name)}" class="inline-block mt-6 px-5 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-medium rounded-lg transition-all shadow-md">
                        {{ __('Discover More') }}
                    </a>
                </div>
            </div>`;
    }

    try {
        const [apiData, geojson] = await Promise.all([
            fetch(apiUrl).then(r => r.ok ? r.json() : []),
            d3.json(geoJsonUrl)
        ]);

        const features = (geojson.features || []).filter(f => {
            const n = (f.properties.NAME_1 || f.properties.name || f.properties.provinsi || '').toString();
            return sumatraProvNames.some(s => n.toLowerCase().includes(s.toLowerCase()));
        });

        fc = { type: 'FeatureCollection', features };

        function renderMap() {
            if (!fc) return;
            const container = svg.node().getBoundingClientRect();
            if (container.width === 0) return; // Prevent error if hidden
            projection.fitSize([container.width, container.height], fc);
            g.selectAll('path').attr('d', pathGen);
        }

        g.selectAll('path')
            .data(fc.features)
            .enter()
            .append('path')
            .attr('fill', '#dcfce7')
            .attr('stroke', '#16a34a')
            .attr('stroke-width', 1.5)
            .style('cursor', 'pointer')
            .style('transition', 'fill 0.2s ease')
            .on('mouseenter', function() { d3.select(this).attr('fill', '#bbf7d0'); })
            .on('mouseleave', function() { 
                const isSelected = d3.select(this).attr('data-selected') === 'true';
                if(!isSelected) d3.select(this).attr('fill', '#dcfce7'); 
            })
            .on('click', function(event, d) {
                g.selectAll('path').attr('stroke', '#16a34a').attr('stroke-width', 1.5).attr('fill', '#dcfce7').attr('data-selected', 'false');
                d3.select(this).attr('stroke', '#15803d').attr('stroke-width', 2.5).attr('fill', '#22c55e').attr('data-selected', 'true');
                showInfo(d.properties, apiData);
            });

        setTimeout(renderMap, 100);
        window.addEventListener('resize', renderMap);
        const observer = new ResizeObserver(() => renderMap());
        observer.observe(document.getElementById('mapInfo').parentElement);

    } catch (error) {
        console.error("Error loading map data:", error);
    }
})();

// ⚙️ SCRIPT ANIMASI SCROLL (NEW!)
document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
        root: null,
        threshold: 0.15 
    };

    const observerMap = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('smooth-active-map');
                obs.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-target-map').forEach(el => observerMap.observe(el));
});
</script>